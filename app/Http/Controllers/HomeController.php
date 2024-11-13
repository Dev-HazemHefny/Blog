<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::id())
        {
            $posts=Post::where('post_status','=','Active')->get();
            $usertype = Auth::user()->usertype;
            if($usertype == 'user')
            {$posts=Post::all();return view('user.homepage',compact('posts'));}
            else if($usertype == 'admin')
            {return view('admin.index');}
            else{return redirect()->back();}
        }
        // return view('admin.index');
    }
    public function homepage()
    {

        $posts=Post::where('post_status','=','Active')->get();
        return view('user.homepage',compact('posts'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create_post()
    {
        return view('user.create_post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_user_post(Request $request)
    {
            $user=Auth()->user();
            $userid=$user->id;
            $username=$user->name;
            $usertype = $user->usertype;
            $post = new Post();
            $post->title = $request->title;
            $post->description = $request->description;
            $post->user_id = $userid;
            $post->name = $username;
            $post->usertype = $usertype;
            $post->post_status = 'Pending   ';
            $image = $request->image;
            if($image)
            {
                $imagename=time().'.'.$image->getClientOriginalExtension();
                $request->image->move('postimage',$imagename);
                $post->image = $imagename;
            }
            $post->save();
            return redirect()->back()->with('success','Post Added Successfully');
    }

    /**
     * Display the specified resource.
     */

            public function my_posts()
            {
                $user =Auth::user();
                $userid = $user->id;
                $data = Post::where('user_id','=',$userid)->get();
                return view('user.my_posts',compact('data'));
            }



     public function my_post_delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('message','Post Deleted Successfully');
    }
    public function my_post_edit($id)
    {
        $post = Post::find($id);
        return view('user.edit_page',compact('post'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function my_post_update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $image =  $request->image;
        if($image)
        {
            $imagename =time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage',$imagename);
            $post->image= $imagename;
        }
        $post->save();
        return redirect()->back();


    }

    /**
     * Update the specified resource in storage.
     */
    public function accept_post($id)
    {
        $post =Post::find($id);
        $post->post_status = 'actived';
        $post->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function reject_post($id)
    {
        $post =Post::find($id);
        $post->post_status = 'rejected';
        $post->save();
        return redirect()->back();
    }

}
