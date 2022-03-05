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
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('images/slide1.jpg') }}" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('images/slide3.jpg') }}" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('images/slide2.jpg') }}" alt="Third slide">
              </div>

            </div>
          </div>
          <div class="container mt-3">
            <h2 class="text-center">Cars available for rent</h2>
          <div class="row text-center">
            @foreach ($cars as $car)
            <div class="col-md-4 mt-4 mb-5">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        @if (!empty($car->img))
                        <td><img height="100px;" width="120px;" src="{{asset('storage/images/car/' . $car->img)}}" alt=""></td>
                        @else
                        <td><img height="100px;" width="120px;" src="{{asset('storage/images/car/noimage.png')}}" alt=""></td>
                        @endif
                    <p class="card-text">{{ $car->mark }} {{ $car->model }}</p>
                    <p>{{ $car->price_per_day }} &euro;</p>
                    </div>
                    @guest
                    @if (Route::has('register'))
                    <button type="button" class="btn btn-info"><a href="{{ route('login') }}"  class="text-white"> Apply</a> </button>
                    @endif
                    @else
                    <a href="{{ route('clcar.edit',$car->id)}}" class="btn btn-primary">Reserve</a>
                    @endguest
                </div>
            </div>
            @endforeach
          </div>
        </div>
    </body>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</html>
