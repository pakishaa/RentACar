@extends('layouts.app')

@section('content')
<div class="board mt-5">
    <div class="row">
    <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add a new Car</div>
                <div class="card-body">
                    <form method="post" action="{{ route('cars.store') }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('mark') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-mark">Mark</label>
                                    <input
                                        type="text"
                                        name="mark"
                                        id="input-mark"
                                        class="form-control form-control-alternative{{ $errors->has('mark') ? ' is-invalid' : '' }}"
                                        placeholder="Mark"
                                        value="{{ old('mark') }}"
                                        autofocus
                                    />
                                    @include('alerts.feedback', ['field' => 'mark'])
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('model') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-model">Model</label>
                                    <input
                                        type="text"
                                        name="model"
                                        id="input-model"
                                        class="form-control form-control-alternative{{ $errors->has('model') ? ' is-invalid' : '' }}"
                                        placeholder="Model"
                                        value="{{ old('model') }}"
                                        autofocus
                                    />
                                    @include('alerts.feedback', ['field' => 'model'])
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('category_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-category_id">Category</label>
                                    <select name="category_id" id="input-category_id" class="form-select4 form-control-alternative{{ $errors->has('category_id') ? ' is-invalid' : '' }}" required>
                                        <option value="" selected></option>
                                        @foreach ($categories as $category)
                                            @if($category['id'] == old('category_id'))
                                                <option value="{{$category['id']}}" selected>{{$category['name']}}</option>
                                            @else
                                                <option value="{{$category['id']}}">{{$category['name']}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @include('alerts.feedback', ['field' => 'category_id'])
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group{{ $errors->has('year') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-year">Year</label>
                                    <input
                                        type="text"
                                        name="year"
                                        id="input-year"
                                        class="form-control form-control-alternative{{ $errors->has('year') ? ' is-invalid' : '' }}"
                                        placeholder="Year"
                                        value="{{ old('year') }}"
                                        autofocus
                                    />
                                    @include('alerts.feedback', ['field' => 'year'])
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group{{ $errors->has('fuel') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-fuel">Fuel</label>
                                    <input
                                        type="text"
                                        name="fuel"
                                        id="input-fuel"
                                        class="form-control form-control-alternative{{ $errors->has('fuel') ? ' is-invalid' : '' }}"
                                        placeholder="Fuel"
                                        value="{{ old('fuel') }}"
                                        autofocus
                                    />
                                    @include('alerts.feedback', ['field' => 'fuel'])
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group{{ $errors->has('ccm') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-ccm">CCM</label>
                                    <input
                                        type="text"
                                        name="ccm"
                                        id="input-ccm"
                                        class="form-control form-control-alternative{{ $errors->has('ccm') ? ' is-invalid' : '' }}"
                                        placeholder="CCM"
                                        value="{{ old('ccm') }}"
                                        autofocus
                                    />
                                    @include('alerts.feedback', ['field' => 'ccm'])
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group{{ $errors->has('power') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-power">Power</label>
                                    <input
                                        type="text"
                                        name="power"
                                        id="input-power"
                                        class="form-control form-control-alternative{{ $errors->has('power') ? ' is-invalid' : '' }}"
                                        placeholder="Power"
                                        value="{{ old('power') }}"
                                        autofocus
                                    />
                                    @include('alerts.feedback', ['field' => 'power'])
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('transmission') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-transmission">Transmission</label>
                                    <input
                                        type="text"
                                        name="transmission"
                                        id="input-transmission"
                                        class="form-control form-control-alternative{{ $errors->has('transmission') ? ' is-invalid' : '' }}"
                                        placeholder="Transmission"
                                        value="{{ old('transmission') }}"
                                        autofocus
                                    />
                                    @include('alerts.feedback', ['field' => 'transmission'])
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('price_per_day') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-price_per_day">Price per Day</label>
                                    <input
                                        type="text"
                                        name="price_per_day"
                                        id="input-price_per_day"
                                        class="form-control form-control-alternative{{ $errors->has('price_per_day') ? ' is-invalid' : '' }}"
                                        placeholder="Price Per Day"
                                        value="{{ old('price_per_day') }}"
                                        autofocus
                                    />
                                    @include('alerts.feedback', ['field' => 'price_per_day'])
                                </div>
                            </div>
                        </div><hr>
                        <div>
                            <div class="form-group{{ $errors->has('img') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="customFile">Uploda Image</label>
                                <input
                                    type="file"
                                    name="img"
                                    id="imgUpload"
                                    class="form-control-file form-control-alternative{{ $errors->has('img') ? ' is-invalid' : '' }}"
                                    value="{{ old('img') }}"
                                    autofocus
                                />
                                @include('alerts.feedback', ['field' => 'img'])
                            </div>
                        </div>
                        <hr>
                        <div>
                            <label for="price_per_day">Description</label>
                            <input type="text" name="description" placeholder="Something about the car...">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-4">Save</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
