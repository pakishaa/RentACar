@extends('layouts.app')

@section('content')
<div class="board mt-5">
    <div class="row">
    <div class="col-md-12">
            <div class="card">
                <div class="card-header">Invoice List</div>
                <div class="card-body">
                    @include('alerts.success')
                    <div class="">
                        <table class="table table-hover mt-3">
                            <thead class="thead-dark">
                                <th scope="col">Car</th>
                                <th scope="col">Total Price (&euro;)</th>
                                <th scope="col">Pickup date</th>
                                <th scope="col">Return date</th>
                                <th scope="col">User Email</th>
                                <th scope="col"></th>
                            </thead>
                            <tbody>
                                @foreach ($invoices as $item)
                                <tr>
                                    <td>{{ $item->mark }} {{ $item->model }}</td>
                                    <td>{{ $item->total_price }} &euro;</td>
                                    <td>{{ $item->pickup_date }}</td>
                                    <td>{{ $item->return_date }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td class="td-actions text-right">
                                        <form action="{{ route('invoiceinfo.destroy', $item->id)}}" method="post">
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
