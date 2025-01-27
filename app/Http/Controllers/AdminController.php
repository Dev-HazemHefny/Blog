<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use lluminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function post_page()
    {
        return view('admin.post_page');
    }
    public function add_post(Request $request)
    {
        $user = Auth()->user();
        $user_id = $user->id;
        $name = $user->name;
        $user_type =$user->usertype;
        $post = new Post ;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->post_status = 'Active';
        $post->user_id = $user_id;
        $post->name = $name;
        $post->usertype = $user_type;

        $image= $request->image;
        if($image)
        {
            $imagename =time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage',$imagename);
            $post->image = $imagename;
        }
        $post->save();
        return redirect()->back()->with('message','Post Added Successfully');
    }
    public function show_post()
    {
        $posts = Post::all();
        return view('admin.show_post',compact('posts'));
    }
    public function delete_post($id)
    {
         $post = Post::findOrfail($id);
         $post->delete();
         return redirect()->back()->with('message','Post Deleted Successfully');
    }
    public function edit_page($id)
    {
        $post = Post::findOrfail($id);
        return view('admin.edit_page',compact('post'));
    }
    public function update_post($id, Request $request)
    {
        $data = Post::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $image = $request->image;
        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage',$imagename);
            $data->image = $imagename;
        }
        $data->save();
        return redirect()->back()->with('message','Post Updated Successfully');
    }
}
