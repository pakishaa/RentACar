@extends('layouts.app')

@section('content')
<div class="board mt-5">
    <div class="row">
    <div class="col-md-12">
            <div class="card">
                <div class="card-header">Reserved Cars</div>
                <div class="card-body">
                    @include('alerts.success')
                    <div class="">
                        <table class="table table-hover mt-3">
                            <thead class="thead-dark">
                                <th scope="col">Mark</th>
                                <th scope="col">Model</th>
                                <th scope="col">Year</th>
                                <th scope="col">CCM</th>
                                <th scope="col">Power</th>
                                <th scope="col">Transmission</th>
                                <th scope="col">Price Per Day (&euro;)</th>
                            </thead>
                            <tbody>
                                @foreach ($cars as $car)
                                <tr>
                                    <td>{{ $car->mark }}</td>
                                    <td>{{ $car->model }}</td>
                                    <td>{{ $car->year }}</td>
                                    <td>{{ $car->ccm }}</td>
                                    <td>{{ $car->power }}</td>
                                    <td>{{ $car->transmission }}</td>
                                    <td>{{ $car->price_per_day }} &euro;</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
