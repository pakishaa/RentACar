@extends('layouts.app')

@section('content')
<div class="board mt-5">
    <div class="row">
    <div class="col-md-12">
            <div class="card">
                <div class="card-header">Update Car Info</div>
                <div class="card-body">
                    <form method="post" action="{{ route('cars.update', $car->id) }}" autocomplete="off">
                        @method('PATCH')
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label for="mark">Mark</label>
                                <input type="text" class="form-control" name="mark" value={{ $car->mark }} />
                            </div>
                            <div class="col-md-4">
                                <label for="model">Model</label>
                                <input type="text" class="form-control" name="model" value={{ $car->model }} />
                            </div>
                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('category_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="category_id">Category *</label>
                                    <select name="category_id" id="category_id" class="form-select form-control-alternative{{ $errors->has('category_id') ? ' is-invalid' : '' }}" required>
                                        @foreach ($categories as $category) @if($category['id'] == old('document') or $category['id'] == $category->category_id)

                                        <option value="{{$category['id']}}" selected>{{$isp['name']}}</option>
                                        @else

                                        <option value="{{$category['id']}}">{{$category['name']}}</option>
                                        @endif @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'category_id'])
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="year">Year</label>
                                <input type="text" class="form-control" name="year" value={{ $car->year }} />
                            </div>
                            <div class="col-md-3">
                                <label for="fuel">Fuel</label>
                                <input type="text" class="form-control" name="fuel" value={{ $car->fuel }} />
                            </div>
                            <div class="col-md-3">
                                <label for="ccm">CCM</label>
                                <input type="text" class="form-control" name="ccm" value={{ $car->ccm }} />
                            </div>
                            <div class="col-md-3">
                                <label for="power">Power</label>
                                <input type="text" class="form-control" name="power" value={{ $car->power }} />
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="transmission">Transmission</label>
                                <input type="text" class="form-control" name="transmission" value={{ $car->transmission }} />
                            </div>
                            <div class="col-md-6">
                                <label for="price_per_day">Price per Day</label>
                                <input type="text" class="form-control" name="price_per_day" value={{ $car->price_per_day }} />
                            </div>
                        </div>
                        <hr>
                        <div>
                            <label for="price_per_day">Description</label>
                            <input type="text" name="description" placeholder="Something about the car..." value={{ $car->description }}>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-4">Update</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
