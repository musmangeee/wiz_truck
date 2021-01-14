@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="header">
            <div class="container-fluid">

                <!-- Body -->
                <div class="header-body">
                    <div class="row align-items-end">
                        <div class="col">

                            <!-- Pretitle -->
                            <h6 class="header-pretitle">
                                Overview
                            </h6>

                            <!-- Title -->
                            <h1 class="header-title">
                               Food
                            </h1>

                        </div>
                       
                    </div> <!-- / .row -->
                </div> <!-- / .header-body -->

            </div>
        </div>
       

        <div class="card">
            <div class="card-body">

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-sm table-nowrap card-table text-secondary">
                        <thead>
                        <tr>
                           
                            <th>Name</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                      
                        @foreach ($products as $item)
                            <tr>
                                
                                <td>{{$item->name}}</td>
                                <td>
                            <img height="30px" src="{{asset('public\business_product/'. $item->image)}}" class="avatar avatar-sm rounded">
                                </td>
                                <td>{{$item->description}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{  \Carbon\Carbon::parse($item->created_at)->diffForhumans()  }}</td>
                                {{-- <td>{{$item->created_at}}</td> --}}
                                <td>
                                    <a href="{{route('products.edit', $item->id)}}"
                                       class="btn btn-warning btn-sm lift"><i class="fe fe-edit"></i></a>
                                    <form action="{{ route('products.destroy', $item->id)}}" method="post"
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
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection

