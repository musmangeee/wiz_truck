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
                            Orders Management
                        </h1>

                    </div>
                    
                </div> <!-- / .row -->
            </div> <!-- / .header-body -->

        </div>
    </div>

    <!-- CARDS -->
    <div class="container-fluid">
        {{-- @if(Session::has('success'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
        @endif
        @if(Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
        @endif --}}

        <div class="row">
            <div class="col-3 col-lg-6 col-xl">

                <!-- Value  -->
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
    
                                <!-- Title -->
                                <h6 class="text-uppercase text-muted mb-2">
                                    Pending Orders
                                </h6>
    
                                <!-- Heading -->
                                <span class="h2 mb-0">
                                    {{ $pending_count }}
                                </span>
    
                            </div>
                            <div class="col-auto">
    
                                <!-- Icon -->
                                <span class="h2 fe fe-star text-muted mb-0"></span>
    
                            </div>
                        </div>
                        <!-- / .row -->
                    </div>
                </div>
    
            </div>
            <div class="col-3 col-lg-6 col-xl">

                <!-- Value  -->
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
    
                                <!-- Title -->
                                <h6 class="text-uppercase text-muted mb-2">
                                    Accepted Orders
                                </h6>
    
                                <!-- Heading -->
                                <span class="h2 mb-0">
                                    {{ $accepted_count }}
                                </span>
    
                            </div>
                            <div class="col-auto">
    
                                <!-- Icon -->
                                <span class="h2 fe fe-star text-muted mb-0"></span>
    
                            </div>
                        </div>
                        <!-- / .row -->
                    </div>
                </div>
    
            </div>
            <div class="col-3 col-lg-6 col-xl">

                <!-- Value  -->
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
    
                                <!-- Title -->
                                <h6 class="text-uppercase text-muted mb-2">
                                    Cancle Orders
                                </h6>
    
                                <!-- Heading -->
                                <span class="h2 mb-0">
                                    {{ $cancle_count }}
                                </span>
    
                            </div>
                            <div class="col-auto">
    
                                <!-- Icon -->
                                <span class="h2 fe fe-star text-muted mb-0"></span>
    
                            </div>
                        </div>
                        <!-- / .row -->
                    </div>
                </div>
    
            </div>
            <div class="col-3 col-lg-6 col-xl">

                <!-- Value  -->
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
    
                                <!-- Title -->
                                <h6 class="text-uppercase text-muted mb-2">
                                    Deliver Orders
                                </h6>
    
                                <!-- Heading -->
                                <span class="h2 mb-0">
                                    {{ $deliver_count }}
                                </span>
    
                            </div>
                            <div class="col-auto">
    
                                <!-- Icon -->
                                <span class="h2 fe fe-star text-muted mb-0"></span>
    
                            </div>
                        </div>
                        <!-- / .row -->
                    </div>
                </div>
    
            </div>
        </div>

        

        <div class="card">
            <div class="card-body">
                <table class="table table-sm table-nowrap">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User</th>
                        <th scope="col">Business</th>
                        <th scope="col">Order Status</th>
                        <th scope="col">Address</th>
                        <th scope="col">Order Type</th>
                        <th scope="col">Amount</th>
                       
                        <th scope="col">Action</th>
                       
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $r)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <th>{{ $r->user->name ??""  }}</th> 
                            <th>{{ $r->restaurant != null ? $r->restaurant->name : '' }}</th> 
                            <th>{{ $r->status }}</th>
                            <th>{{ $r->address }}</th>
                            <th>{{ $r->order_type }}</th>
                            <th>{{ $r->total }}</th>
                            <td>
                                <a href="{{route('order.edit', $r->id)}}"
                                   class="btn btn-warning btn-sm lift"><i class="fe fe-edit"></i></a>
                                <form action="{{ route('order.destroy', $r->id)}}" method="post"
                                      class="d-inline-block">
                                    @csrf
                                    @method('DELETE')   
                                    <button class="btn btn-danger btn-sm lift   " type="submit"><i class="fe fe-trash"></i>
                                    </button>
                                </form>
                            </td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $orders->links() }}
            </div>
        </div>
    </div>


@endsection


