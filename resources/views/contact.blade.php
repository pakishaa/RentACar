@extends('layouts.app')

@section('content')
<div class="board mt-5">
    <div class="row">
    <div class="col-md-12">
            <div class="card">
                <div class="card-header">Cars List</div>
                <div class="card-body">
                    <div class="">
                        <table class="table table-hover mt-3">
                            <thead class="thead-dark">
                                <th scope="col">From Name</th>
                                <th scope="col">From email</th>
                                <th scope="col">From mobile number</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Message</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @foreach ($messages as $message)
                                <tr>
                                    <td>{{ $message->name }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ $message->mobile_number }}</td>
                                    <td>{{ $message->subject }}</td>
                                    <td>{{ $message->message }}</td>
                                    <td class="td-actions text-right">
                                        <form action="{{ route('contact.destroy', $message->id)}}" method="post">
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
