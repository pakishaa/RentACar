@extends('layouts.app')

@section('content')
<div class="board mt-5">
    <div class="row">
    <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add a new Category</div>
                <div class="card-body">
                    <form method="post" action="{{ route('categories.store') }}" autocomplete="off">
                        @csrf
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">Name</label>
                            <input
                                type="text"
                                name="name"
                                id="input-name"
                                class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                placeholder="Category name"
                                value="{{ old('name') }}"
                                autofocus
                            />
                            @include('alerts.feedback', ['field' => 'name'])
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
