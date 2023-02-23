@extends('layouts.master')
@section('title')
    Orders
@endsection
@section('css')
    <style>
        .cardstyle{
            box-shadow: 0 0 0 3px rgb(0 0 0 / 4%);
    border-radius: 8px;
    padding: 13px;
        }
    </style>
@endsection

@section('content')
<div class="card cardstyle">
    <div class="header">
        <b>Orders</b>
        <span class="float-right"> <a href="{{ route('order.create') }}" class="btn btn-info">Add Order <span data-feather="plus"></span></a></span>
    </div>
    <br><br>
    <div class="row pt-2">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Order No</th>
                        <th scope="col">Customer</th>
                        <th scope="col">date</th>
                        <th scope="col">Total</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if (count($orders)> 0)
                        @foreach ($orders as $item)
                        <tr>
                            <td>{{ $loop->iteration  }}</td>
                            <td>{{ $item->order_no  }}</td>
                            <td>{{ $item->customer->name  }}</td>
                            <td>{{ $item->date  }}</td>
                            <td>{{ $item->total  }}</td>
                            <td>
                                <a href="{{ route('order.edit', $item->id ) }}" class="btn text-primary"> <span data-feather="edit"></span></a>
                                <a href="{{ route('order.destroy', $item->id) }}" class="btn text-danger"> <span data-feather="trash-2"></span></a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                            <tr>
                                <td colspan="5">
                                    <div class="alert alert-warning text-center">
                                        Sorry,Not Found Data <span data-feather="database"></span>
                                    </div>
                                </td>
                            </tr>
                        @endif



                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
