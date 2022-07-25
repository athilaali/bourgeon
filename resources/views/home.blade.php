@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="list-unstyled">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">
                                <ul class="list-unstyled">
                                    <li>{{ session('success') }}</li>
                                </ul>
                            </div>
                        @endif

                    </div>

                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-refer-tab" data-bs-toggle="pill" data-bs-target="#pills-refer" type="button" role="tab" aria-controls="pills-refer" aria-selected="true">Refer a friend</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-coupons-tab" data-bs-toggle="pill" data-bs-target="#pills-coupons" type="button" role="tab" aria-controls="pills-coupons" aria-selected="false">Available coupons</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-orders-tab" data-bs-toggle="pill" data-bs-target="#pills-orders" type="button" role="tab" aria-controls="pills-orders" aria-selected="false">Order sections</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-refer" role="tabpanel" aria-labelledby="pills-refer-tab">
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Refer to</label>

                                <div class="col-md-6">
                                    <form action="{{ url('/refer') }}" method="post">
                                        @csrf
                                        <input id="email" type="email" class="form-control" name="email" placeholder="Email address of your friend" required autofocus> </br> </br>
                                        <input class="btn-success" type="submit" name="submit" value="submit">
                                    </form>
                                </div>

                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-coupons" role="tabpanel" aria-labelledby="pills-coupons-tab">

                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">Coupon Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($coupons as $key => $value)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td> {{$value->coupon_name}} </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>


                        </div>

                        <div class="tab-pane fade" id="pills-orders" role="tabpanel" aria-labelledby="pills-orders-tab">..vnfgy.
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($coupons as $key => $value)

                                        @php
                                            $splittedString = explode('-', $value->product_name);
                                            $product_name =  $splittedString[0];
                                            $price = $splittedString[1];
                                        @endphp

                                        <tr>
                                            <th scope="row">{{ ++$key }}</th>
                                            <td> {{ str_replace('_', ' ', $product_name ) }} </td>
                                            <td> $ {{ $price}} </td>
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
</div>
@endsection
