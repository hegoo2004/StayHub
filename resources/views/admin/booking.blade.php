<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
       
     .table_deg
     {

       border: 2px solid white;
       margin:auto;
       width:80%;
       text-align:center;
       margin-top: 40px;

    }
    .th_deg
    {
        background-color: skyblue;
        padding: 8px;
      
    }
    tr
    {

        border: 5px solid white;
    }
    td 
    {
        padding: 15px;
    }


      </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
          <table class="table_deg">

<tr>
 <th class="th_deg">room_id</th>
 <th class="th_deg">Customer name</th>
 <th class="th_deg">Email</th>
 <th class="th_deg">Phone</th>
 <th class="th_deg">Arrival Date</th>
 <th class="th_deg">Leaving Date</th>
    <th class="th_deg">Status</th>
    <th class="th_deg">Room Title</th>
    <th class="th_deg">Price</th>
    
    <th class="th_deg">Cancel</th>
    <th class="th_deg">Status Update</th>
</tr>

@foreach($data as $data)
<tr>
 <td> {{$data->room_id}}</td>
 <td> {{$data->name}}</td>
 <td>{{$data->email}} </td>
 <td> {{$data->phone}}</td>
 <td> {{$data->start_date}}</td>
 <td> {{$data->end_date}}</td>
 <td> 
    @if($data->status=='Approved')
    <span style="color: green;">Approved</span>
    @endif
   @if($data->status== 'Rejected')
   <span style="color: red;">Rejected</span>
    @endif
   @if($data->status== 'waiting')
   <span style="color: yellow;">waiting</span>
    @endif
 </td>
 <td> {{$data->room->room_title}}</td>
 <td> {{$data->room->price}}</td>
 
 <td>
    <a onclick="return confirm('Are you sure to cancel this booking');" class="btn btn-danger"href="{{url('cancel_booking',$data->id)}}">Cancel</a>
 </td>
 <td>
    <span style="padding-bottom: 10px;">

        <a class="btn btn-success"href="{{url('approve_booking',$data->id)}}">Approve</a>
    </span>
    <a class="btn btn-warning"href="{{url('reject_booking',$data->id)}}">Reject</a>
 </td>
</tr>
@endforeach

</table>

          </div>
        </div>
    </div>
    @include('admin.footer')
  </body>
</html>