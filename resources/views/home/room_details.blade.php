<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public"> 
    @include('home.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style type="text/css">
      label
      {
          display: inline-block;
          width: 200px;
      }
      input
      {
         width: 100%;
      }
    </style>
      </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
        @include('home.header')
         <!-- end header a -->
       </header>
       <div  class="our_room">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Our Rooms</h2>
                     <p>Lorem Ipsum available, but the majority have suffered </p>
                  </div>
               </div>
            </div>

            <div class="row">
               
               <div class="col-md-8" >
                  <div id="serv_hover"  class="room">
                     <div class="room_img">
                        <figure><img style="height: 300px;width:900px" src="/room/{{$room->image}}" alt="#"/></figure>
                     </div>
                     <div class="bed_room">
                        <h3>{{$room->room_title}}</h3>
                        <p style="padding: 12px;">{{$room->descrtiption}}</p>
                        <h4 style="padding: 12px;">Free wifi: {{$room->wifi}}</h4>
                        <h4 style="padding: 12px;">Room type: {{$room->room_type}}</h4>
                        <h4 style="padding: 12px;">Price: {{$room->price}}</h4>
                        </div>
                  </div>
               </div>
               <div class="col-md-4">
                  
                  <h1 style="font-size:40px!important" >Book Room</h1>
                   <div>
                   @if(session()->has('message'))
                   <div class="alert alert-success" role="alert">
                      {{session()->get('message')}}
                     <button type="button" class="cloase" data-bs-dismiss="alert">              X</button>

                     </div>


                   @endif
                   </div>



                  @if($errors)

                  @foreach($errors->all() as $error)
                  <li style="color: red;">
                  {{$error}}
                  </li>
                  @endforeach
                  @endif
                  <form action="{{url('add_booking',$room->id)}}" method="post">
                     @csrf
                     <input type="hidden" name="room_id" value="{{$room->id}}">
                  <div>
                       <label>Name</label>
                       <input type="text" name="name" 
                       @if(Auth::id())
                       value="{{Auth::user()->name}}"
                       @endif	>
                     </div>
                     <div>
                        <label>Email</label>
                        <input type="text" name="email" 
                        @if(Auth::id())
                        value="{{Auth::user()->email}}"
                        @endif>
                     </div>
                     <div>
                        <label>phone</label>
                        <input type="number" name="phone" 
                        @if(Auth::id())
                         value="{{Auth::user()->phone}}"
                         @endif>
                     </div>
               <div>
                  <label>Start Date</label>
                  <input type="date" name="StartDate" id="StartDate">
               </div>
               <div>
                  <label>End Date</label>
                  <input type="date" name="endDate" id="endDate">
               </div>
               <div style="padding-top: 20px;">
                  <input type="submit" class="btn btn-primary" value="Book Room" >
               </div>
            </form>
            </div>
         </div>
      </div>
      </div>
      @include('home.footer')
      <script type="text/javascript">
        $(function(){
         var dtToday = new Date();
         var month = dtToday.getMonth() + 1;
         var day = dtToday.getDate();
         var year = dtToday.getFullYear();
         if(month < 10)
             month = '0' + month.toString();
         if(day < 10)
               day = '0' + day.toString();
         var maxDate = year + '-' + month + '-' + day;
         $('#StartDate').attr('min', maxDate);
         $('#endDate').attr('min', maxDate);
        });
         
      </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
   </body>
</html>