@extends('layouts.app-client')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Laravel</title>
      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
   </head>
   <body>
      @include('layouts.navbars.navbar-client')
      <div class="container mt-5">
         @if (\Session::has('success'))
         <div class="alert alert-success">
            <ul>
               <li>{!! \Session::get('success') !!}</li>
            </ul>
         </div>
         @endif
         <div class="card">
            <div class="card-header">
               Reserved car
            </div>
            <div class="card-body">
               <h5 class="card-title">Car specifications</h5>
               <ul class="list-group list-group-flush">
                  <li class="list-group-item">Mark: {{ $cars->mark }}</li>
                  <li class="list-group-item">Model: {{ $cars->model }}</li>
                  <li class="list-group-item">Year: {{ $cars->year }}</li>
                  <li class="list-group-item">CCM: {{ $cars->ccm }}</li>
                  <li class="list-group-item">Power (HP): {{ $cars->power }}</li>
                  <li class="list-group-item">Transmission: {{ $cars->transmission }}</li>
                  <li class="list-group-item">Price Per Day: {{ $cars->price_per_day }}</li>
               </ul>
               <form method="post" action="{{ route('clcar.update', $cars->id) }}" autocomplete="off">
                  @method('PATCH')
                  @csrf
                  <div class="text-center">
                     <button type="submit" class="btn btn-success mt-4">Reserve</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </body>
   <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</html>
