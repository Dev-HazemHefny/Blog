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
        /* services section start */
.services_section {
width: 100%;
float: left;
padding-bottom: 90px;
}

.services_taital {
width: 100%;
float: left;
font-size: 40px;
color: #1f1f1f;
font-weight: bold;
}

.services_text {
width: 100%;
float: left;
font-size: 16px;
color: #1f1f1f;
margin: 0px;
}

.services_section_2 {
width: 100%;
float: left;
margin-top: 90px;
}

.services_img {
width: 100%;
height: 100%;
float: left;
text-align: center;
}

.btn_main {
width: 170px;
margin: 0 auto;
text-align: center;
}

.btn_Add{width: 170px;}
.btn_Add a{
width: 100%;
font-size: 16px;
color:black;
background-color:rgb(214, 211, 211);
text-align: center;
padding: 10px 10px;
border-radius: 10px;
font-weight: bold;
text-transform: uppercase;
text-decoration: none;
}
.btn_main a {
width: 100%;
float: left;
font-size: 16px;
color: #ffffff;
background-color: #782222;
text-align: center;
padding: 10px 0px;
border-radius: 30px;
font-weight: bold;
margin-top: 20px;
text-transform: uppercase;
text-decoration: none;
}

.btn_main a:hover {
color: #ffffff;
background-color: #000d10;
}

.btn_main.active a {
color: #ffffff;
background-color: #000d10;
}
/* services section end */
    </style>
</head>
<body>

    <div class="services_section layout_padding">
        <div class="container">
         <h1 class="services_taital mt-5" align='center'>My Posts </h1>
         {{-- <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p> --}}
         <div class="services_section_2">
            <div class="row">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{session()->get('message')}}
                    </div>
                @endif
              @foreach($data as $data )
              <div class="col-md-4">
                  {{-- <div><img src="/postimage/{{$post->image}}" class="services_img"></div>
                  <div class="btn_main"><a href="#">Rafting</a></div> --}}
                  <div class="card" style="width: 18rem; ">
                      <img src="/postimage/{{$data->image}}" class="services_img" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">{{$data->title}}</h5>
                        <p class="card-text">{{$data->description}}</p>
                        <div  class="btn_main">
                            <a href="{{url('my_post_delete',$data->id)}}">Delete</a>
                            <a style="background-color: rgb(56, 56, 255)" href="{{url('my_post_edit',$data->id)}}">Edit</a>
                          </div>
                      </div>
                    </div>
              </div>
              @endforeach
              </div>
         </div>
      </div>
   </div>
</body>
</html>
</x-app-layout>