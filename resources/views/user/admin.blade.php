@extends('layouts.layout')
@section('content')
 <h1>My Store - Admin</h1>
 <div class="items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
 <h5>Welcome admin</h5>
 <div class="alert alert-success notification" style="display:none"></div>
 </div>
 <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
 <script>

   // Enable pusher logging - don't include this in production
   Pusher.logToConsole = true;

   var pusher = new Pusher('4e66b9e603d72ae77302', {
     cluster: 'ap2'
   });

   var channel = pusher.subscribe('my-store');
   channel.bind('new-user', function(data) {
     $("div.notification").html(data.user.name);
     $("div.notification").show();
   });
 </script>
@endsection