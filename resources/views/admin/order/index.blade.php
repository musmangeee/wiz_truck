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
                       
                        <th scope="col">Action</th>
                       
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $r)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <th>{{ $r->user->name  }}</th> 
                            <th>{{ $r->restaurant != null ? $r->restaurant->name : '' }}</th> 
                            <th>{{ $r->status }}</th>
                            <th>{{ $r->address }}</th>
                            <th>{{ $r->order_type }}</th>
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


