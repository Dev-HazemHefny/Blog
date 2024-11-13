<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <style>
            .h{font-size: 30px;font-weight: bold;text-align: center;margin-top: 20px}
            .f_div{text-align: center;margin: auto;}
            label{font-size: 20px}
        </style>
    </head>
    <body>
    <h1 class="h mb-12">Update Post</h1>

    <form class="bg-slate-100 p-2" action="{{url('my_post_update',$post->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 w-25 f_div">
          <label class="form-label">Title</label>
          <input type="text" value="{{$post->title}}" class="form-control" name="title" >
        </div>
        <div class="mb-3 w-25 f_div">
            <label class="form-label">Description</label>
            <input type="text" class="form-control" value="{{$post->description}}" name="description" >
          </div>
          <div class="mb-3 w-25 f_div">
            <label class="form-label">Image</label>
            <img class="mx-auto" src="/postimage/{{$post->image}}" alt="">
        </div>
          <div class="mb-3 w-25 f_div">
            <label class="form-label">New Image</label>
            <input type="file" class="form-control" name="image" >
          </div>
          <div class="mb-3 w-25 f_div">
            <input type="submit" class="btn btn-success" value="Update">
          </div>

      </form>

    </body>
    </html>
    </x-app-layout>