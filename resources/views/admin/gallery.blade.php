<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')



    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
            <center>

                <h1 style="font-size:40px; font-weight:bolder; color:white">Gallery</h1>
                <div class="row">	

                    @foreach($gallery as $gallery)
                    <div class="col-md-4">

                        <img src="/gallery/{{$gallery->image}}" style="width:200px; height:200px; margin:10px;">
                        <a href="{{url('delete_gallery/'.$gallery->id)}}" class="btn btn-danger">Delete</a>
                    </div>
                    @endforeach
                </div>
                <form  method="post" action="{{url('upload_gallery')}}" enctype="multipart/form-data">
                    @csrf
                    <div style=" padding:30px; ">
                        <label style="color: white; font-weight:bold" >Upload Image</label>
                        <input type="file" name="image" required>
                   
                        <input class="btn btn-primary" type="Submit" value="Add Image">
                    </div>
                </form>
            </center>


            </div>
        </div>
    </div>
    @include('admin.footer')
  </body>
</html>