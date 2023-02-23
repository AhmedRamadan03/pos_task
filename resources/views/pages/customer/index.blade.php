@extends('layouts.master')
@section('title')
    Customers
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
        <b>Customers</b>
        <span class="float-right"> <button onclick="$('.customer-modal').modal('show')" class="btn btn-info">Add Customer <span data-feather="plus"></span></button></span>
    </div>
    <br><br>
    <div class="row pt-2">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if (count($customers)> 0)
                        @foreach ($customers as $item)
                        <tr>
                            <td>{{ $loop->iteration  }}</td>
                            <td>{{ $item->name  }}</td>
                            <td>{{ $item->email  }}</td>
                            <td>{{ $item->address  }}</td>
                            <td>
                                <a href="{{ route('customer.index', ['resource'=>$item->id ]) }}" class="btn text-primary"> <span data-feather="edit"></span></a>
                                <a href="{{ route('customer.destroy', $item->id) }}" class="btn text-danger"> <span data-feather="trash-2"></span></a>
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
@include('pages.customer.form')
@endsection

@section('js')
<script>
    @if ( request()->resource > 0 )
               $('.customer-modal').modal('show');
           @endif
</script>
@endsection
