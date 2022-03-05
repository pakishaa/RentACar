@extends('layouts.app')

@section('content')
<div class="board mt-5">
    <div class="row">
    <div class="col-md-12">
            <div class="card">
                <div class="card-header">Car Category List</div>
                <div class="card-body">
                    @include('alerts.success')
                    <a href="{{ route('categories.create') }}" class="btn btn-sm btn-success">New Category</a>
                    <div class="">
                        <table class="table table-hover mt-3">
                            <thead class="thead-dark">
                                <th scope="col">Name</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td class="td-actions text-right">
                                            <form action="{{ route('categories.destroy', $category->id)}}" method="post">
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
