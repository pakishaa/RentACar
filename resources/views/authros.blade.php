@extends('layouts.app-client')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <style>
            .card {
                margin: 0 auto;
                float: none;
                margin-bottom: 10px;
            }
        </style>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
        @include('layouts.navbars.navbar-client')
        <div class="container mt-5">
            <h3 class="text-center">Authors</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="card" style="width: 18rem;">
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">Nikola Parezanović 55/2017</li>
                          <li class="list-group-item">IT</li>
                          <li class="list-group-item">Rent A car project</li>
                        </ul>
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="card" style="width: 18rem;">
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">Uglješa Živaljević 207/2017</li>
                          <li class="list-group-item">IT</li>
                          <li class="list-group-item">Rent A car project</li>
                        </ul>
                      </div>
                </div>
            </div>
        </div>
        <div class="container text-center">
            <a id="pdf" class="text-center" href="{{ asset('rentacar.pdf') }}" download>Download PDF version</a>
        </div>
    </body>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</html>
