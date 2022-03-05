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
      <div class="container">
         @include('alerts.success')
         <table class="table table-hover mt-3">
            <thead class="thead-dark">
               <th scope="col">ID</th>
               <th scope="col">Total Price</th>
               <th scope="col">Picku Date</th>
               <th scope="col">Return Date</th>
               <th scope="col">Car</th>
            </thead>
            <tbody>
               @foreach ($cars as $car)
               <tr>
                  <td>{{ $car->id }}</td>
                  <td>{{ $car->total_price }}</td>
                  <td>{{ $car->pickup_date }}</td>
                  <td>{{ $car->return_date }}</td>
                  <td>{{ $car->mark }} {{ $car->model }}</td>
               </tr>
               @endforeach
            </tbody>
         </table>
         <div class="text-center">
            <a href="{{ route('invoice.create') }}" class="btn btn-sm btn-success">Create Invoice</a>
         </div>
      </div>
   </body>
   <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</html>
