@extends('layouts.app')
@section('content')
<div class="board mt-5">
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-header">Cars List</div>
            <div class="card-body">
               @include('alerts.success')
               <a href="{{ route('cars.create') }}" class="btn btn-sm btn-success">Add Car</a>
               <div class="">
                  <table class="table table-hover mt-3">
                     <thead class="thead-dark">
                        <th scope="col">Name</th>
                        <th scope="col">Year</th>
                        <th scope="col">Fuel</th>
                        <th scope="col">Transmission</th>
                        <th scope="col">Price Per Day</th>
                        <th scope="col">Image</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                     </thead>
                     <tbody>
                        @foreach ($cars as $car)
                        <tr>
                           <td>{{ $car->mark }} {{ $car->model }}</td>
                           <td>{{ $car->year }}</td>
                           <td>{{ $car->fuel }}</td>
                           <td>{{ $car->transmission }}</td>
                           <td>{{ $car->price_per_day }} &euro;</td>
                           @if (!empty($car->img))
                           <td><img height="40px;" width="60px;" src="{{asset('storage/images/car/' . $car->img)}}" alt=""></td>
                           @else
                           <td><img height="40px;" width="60px;" src="{{asset('storage/images/car/noimage.png')}}" alt=""></td>
                           @endif
                           <td class="text-right">
                              <a href="{{ route('cars.edit', $car->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                           </td>
                           <td class="td-actions text-right">
                              <form action="{{ route('cars.destroy', $car->id)}}" method="post">
                                 @csrf
                                 @method('DELETE')
                                 <button class="btn btn-danger" type="submit"><i class="far fa-trash-alt"></i></button>
                              </form>
                           </td>
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
