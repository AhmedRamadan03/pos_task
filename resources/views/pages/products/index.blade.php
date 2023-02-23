@extends('layouts.master')
@section('title')
    Products
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
        <b>Products</b>
        <span class="float-right"> <button onclick="$('.product-modal').modal('show')" class="btn btn-info">Add Product <span data-feather="plus"></span></button></span>
    </div>
    <br><br>
    <div class="row pt-2">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">title</th>
                        <th scope="col">quantity</th>
                        <th scope="col">price</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if (count($products)> 0)
                        @foreach ($products as $item)
                        <tr>
                            <td>{{ $loop->iteration  }}</td>
                            <td>{{ $item->title  }}</td>
                            <td>{{ $item->quantity  }}</td>
                            <td>{{ $item->price  }}</td>
                            <td>
                                <a href="{{ route('product.index', ['resource'=>$item->id ]) }}" class="btn text-primary"> <span data-feather="edit"></span></a>
                                <a href="{{ route('product.destroy', $item->id) }}" class="btn text-danger"> <span data-feather="trash-2"></span></a>
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
@include('pages.products.form')
@endsection

@section('js')
<script>
    @if ( request()->resource > 0 )
               $('.product-modal').modal('show');
           @endif
</script>
@endsection
