@extends('layouts.master')
@section('title')
    Home
@endsection
@section('css')
    <style>
        .feather{
            width: 40px;
            height: 40px;
        }
    </style>
@endsection
@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-4">
           <a href="{{ route('customer.index') }}" class="nav-link">
            <div class="card">
                <div class="card-body ">
                    <div class="d-flex justify-content-between">
                        <b>
                            Customers  <br> {{ $customerCount }}
                        </b>
                        <div class="">
                            <span data-feather="user" class="feather"></span>
                        </div>
                    </div>
                </div>
            </div>
           </a>
        </div>
        <div class="col-md-4">
           <a href="{{ route('product.index') }}" class="nav-link">
            <div class="card">
                <div class="card-body ">
                    <div class="d-flex justify-content-between">
                        <b>
                            Products  <br> {{ $productCount }}
                        </b>
                        <div class="">
                            <span data-feather="user" class="feather"></span>
                        </div>
                    </div>
                </div>
            </div>
           </a>
        </div>
        <div class="col-md-4">
           <a href="{{ route('order.index') }}" class="nav-link">
            <div class="card">
                <div class="card-body ">
                    <div class="d-flex justify-content-between">
                        <b>
                            Orders  <br> {{ $orderCount }}
                        </b>
                        <div class="">
                            <span data-feather="shop" class="feather"></span>
                        </div>
                    </div>
                </div>
            </div>
           </a>
        </div>
    </div>
</div>
@endsection
