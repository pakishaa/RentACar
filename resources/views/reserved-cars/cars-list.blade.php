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
      @include('alerts.success')
      <div class="container">
         <table class="table table-hover mt-3">
            <thead class="thead-dark">
               <th scope="col">ID</th>
               <th scope="col">Mark</th>
               <th scope="col">Model</th>
               <th scope="col">Year</th>
               <th scope="col">CCM</th>
               <th scope="col">Power</th>
               <th scope="col">Transmission</th>
               <th scope="col">Price Per Day</th>
            </thead>
            <tbody>
               @foreach ($reservedcars as $car)
               <tr>
                  <td>{{ $car->id }}</td>
                  <td>{{ $car->mark }}</td>
                  <td>{{ $car->model }}</td>
                  <td>{{ $car->year }}</td>
                  <td>{{ $car->ccm }}</td>
                  <td>{{ $car->power }}</td>
                  <td>{{ $car->transmission }}</td>
                  <td>{{ $car->price_per_day }}</td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </body>
   <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</html>
