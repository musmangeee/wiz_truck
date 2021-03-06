@extends('layouts.frontend')


@section('content')
    @include('frontend.partials.default_banner')

    <div class="container">
        <h1 class="text-center">Cart Page</h1>
        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th width="50%">Product</th>
                    <th width="10%">Price</th>
                    <th width="8%">Quantity</th>
                    <th width="22%">Sub Total</th>
                    <th width="10%"></th>
                </tr>
                </thead>
                <tbody>
                @php $total = 0; @endphp
                @if(session('cart'))
                    @foreach(session('cart') as $id => $product)
                        @php
                            $sub_total = $product['price'] * $product['quantity'];
                            $total += $sub_total;
                        @endphp
                        <tr>
                            <td>
                                
                                <span>{{$product['name']}}</span>
                            </td>
                            <td>${{$product['price']}}</td>
                            <td>{{$product['quantity']}}</td>
                            <td>${{$sub_total}}</td>
                            <td>
                                <a href="{{route('remove', [$id])}}" class="btn btn-danger btn-sm">X</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
                <tfoot>
                <tr>
                    <td>
                        <a href=""
                           class="btn btn-warning"
                        >Continue Shopping</a>
                        

                    </td>
                    <td colspan="2"></td>
                    <td><strong>Total ${{$total}}</strong></td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>


    @endsection