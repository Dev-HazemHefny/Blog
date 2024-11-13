<!DOCTYPE html>
<html>
  <head>
        @include('admin.css')
        <style type="text/css">
        .title_deg{font-size: 30px;font-weight: bold;text-align: center;padding: 30px; color: white}
        .img_deg{height: 100px; width: 150px;padding: 10px;}
        </style>
  </head>
  <body>
    @include('admin.header')

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
        @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
       <div class="page-content">
        @if (session()->has('message'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
        </div>
        @endif
        <h1 class="title_deg">All Posts</h1>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Posted By</th>
                <th scope="col">Post Status</th>
                <th scope="col">User Type</th>
                <th scope="col">Image</th>
                <th scope="col">Delete</th>
                <th scope="col">Edit</th>
                <th scope="col">Status Accept</th>
                <th scope="col">Status Reject</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post )
                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                    <td>{{$post->name}}</td>
                    <td>{{$post->post_status}}</td>
                    <td>{{$post->usertype}}</td>
                    <td><img class="img_deg" src="postimage/{{$post->image}}" alt=""></td>
                    <td><a class="btn btn-danger" href="{{url('delete_post',$post->id)}}" >Delete</a></td>
                    <td><a class="btn btn-success" href="{{url('edit_page',$post->id)}}">Edit</a></td>

                    <td><a class="btn btn-primary" href="{{url('accept_post',$post->id)}}">Accept</a></td>
                    <td><a class="btn btn-warning" href="{{url('reject_post',$post->id)}}">Reject</a></td>
                </tr>
                @endforeach
            </tbody>
          </table>

       </div>
      @include('admin.footer')
  </body>
</html>