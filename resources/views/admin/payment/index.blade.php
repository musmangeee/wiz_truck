@extends('layouts.admin')

@section('content')


    <div class="header">
        <div class="container">

            <!-- Body -->
            <div class="header-body">
                <div class="row align-items-end">
                    <div class="col">

                        <!-- Pretitle -->
                        <h6 class="header-pretitle">
                            Orders
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title">
                            Payments
                        </h1>

                    </div>
                    
                </div> <!-- / .row -->
            </div> <!-- / .header-body -->

        </div>
    </div>

    <!-- CARDS -->
    <div class="container-fluid">
       
        

        <div class="card">
            <div class="card-body">
                <table class="table table-sm table-nowrap">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User</th>
                        <th scope="col">Business</th>
                        <th scope="col">Order Status</th>
                        {{-- <th scope="col">Address</th>
                        <th scope="col">Order Type</th> --}}
                        <th scope="col">Total Earn</th>
                        <th scope="col">Ridder Earnings</th>
                        <th scope="col">Food Truck Earnings</th>  
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $r)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <th>{{ $r->user->name ??""  }}</th> 
                            <th>{{ $r->restaurant != null ? $r->restaurant->name : '' }}</th> 
                            <th>{{ $r->status }}</th>
                            {{-- <th>{{ $r->address }}</th> --}}
                            {{-- <th>{{ $r->order_type }}</th> --}}
                            <th>{{ $r->total }}</th>
                            <th>{{ $r->rider_earning }}</th>
                            <th>{{ $r->foodtruck_earning }}</th>
                         
                            </tr>
                    @endforeach
                    </tbody>
                </table>
               
            </div>
        </div>
    </div>


@endsection


