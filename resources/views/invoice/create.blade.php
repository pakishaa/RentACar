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
      <form method="post" action="{{ route('invoice.store') }}" autocomplete="off">
         @csrf
         <div class="container mt-4">
            <div class="row">
               <div class="col-md-6">
                  <label for="mark">Pickup date *</label><br>
                  <input type="date" id="pickup-date" name="pickup-date"
                     value="<?php echo date("Y-m-d"); ?>"
                     >
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <label for="model">Return date *</label><br>
                  <input type="date" id="return-date" name="return-date"
                     value="<?php echo date("Y-m-d", strtotime("+1 day")); ?>"
                     >
               </div>
            </div>
            <br>
            <div class="row">
               <div class="col-md-4">
                  <div class="form-group{{ $errors->has('car_id') ? ' has-danger' : '' }}">
                     <label class="form-control-label" for="input-category_id">CAR *</label>
                     <select name="car_id" id="input-car_id" class="form-select4 form-control-alternative{{ $errors->has('car_id') ? ' is-invalid' : '' }}" required>
                        <option value="" selected></option>
                        @foreach ($cars as $car)
                        @if($car['id'] == old('car_id'))
                        <option value="{{$car['id']}}" selected>{{$car['mark']}} {{ $car['model']}}</option>
                        @else
                        <option value="{{$car['id']}}">{{$car['mark']}} {{ $car['model']}}</option>
                        @endif
                        @endforeach
                     </select>
                     @include('alerts.feedback', ['field' => 'category_id'])
                  </div>
               </div>
            </div>
            <div class="text-center">
               <button type="submit" class="btn btn-success mt-4">Save</button>
            </div>
      </form>
      </div>
   </body>
   <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</html>
