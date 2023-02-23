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
        <b>
        @if ($resource->id)
            Edit Order
        @else
        Create Order
        @endif
        </b>
        <hr>
    </div>
    <div class="row ">
        <div class="col-12">
            <form action="{{$resource->id ?  route('order.update' , $resource->id) : route('order.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 "    >
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""><b>Order No :</b></label>
                                    <input type="text" class="form-control " name="order_no" required placeholder="order no" value="{{old('order_no', $resource->order_no )}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""><b>Date :</b></label>
                                    <input type="date" class="form-control " name="date" required placeholder="date" value="{{ old('date',$resource->date) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""><b>Customer :</b></label>
                                    <select name="customer_id" class="form-control form-select" id="">
                                        <option value="" selected disabled hidden> Select Customer</option>
                                        @foreach ($customers as $id=>$item)
                                            <option {{ $resource->customer_id == $id ?'selected':'' }} value="{{ $id }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7 pt-5 border-top">
                        @include('pages.orders.product_cart',['products'=>$products])
                    </div>
                    <div class="col-md-5 pt-5">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody class="order-list">
                                @if ($resource->id)
                                @foreach ($resource->orderDetails as $item)
                                <tr>
                                    <td>{{ $item->product->title }}</td>
                                    <td><input type="number"  name="products[{{ $item->product_id }}][quantity]" data-price="{{ number_format($item->product->price, 2) }}" class="form-control input-sm product-quantity" min="1" value="{{ $item->quantity }}"></td>
                                    <td class="product-price">{{ number_format($item->total , 2) }}</td>
                                    <td>
                                        <button class="btn text-danger btn-sm remove-product-btn" data-id="{{ $item->product_id }}">X</button>
                                    </td>
                                </tr>
                                @endforeach
                                @else

                                @endif

                            </tbody>

                        </table><!-- end of table -->

                        <h4>Total : <span class="total-price">{{ $resource->id?  number_format($resource->total, 2) :0}}</span></h4>
                        <input type="hidden" class="total-price" name="total" value="">

                        {{-- <button class="btn btn-primary btn-block disabled" id="add-order-form-btn"><i class="fa fa-plus"></i> @lang('site.add_order')</button> --}}
                    </div>


                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" style="width: 100%">Save</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/custom/order.js') }}"></script>

@endsection
