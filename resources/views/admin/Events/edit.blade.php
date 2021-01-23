@extends('layouts.admin')

@section('content')

<div class="row justify-content-center">
    <div class="col-12 col-lg-10 col-xl-8">

        <!-- Header -->
        <div class="header mt-md-5">
            <div class="header-body">
                <div class="row align-items-center">
                    <div class="col">

                        <!-- Pretitle -->
                        <h6 class="header-pretitle">
                             Business 
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title">
                           Update Products
                        </h1>

                    </div>
                </div> <!-- / .row -->
            </div>
        </div>
        {{-- @if(Session::has('success'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
        @endif
        @if(Session::has('error'))
        <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
        @endif --}}

        <!-- Form -->
        <form role="form" action="{{route('products.update',$products->id)}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            @csrf

            <!-- Project name -->
            <div class="form-group">

                <!-- Label  -->
                <label>
                    Name
                </label>

                <!-- Input -->
                <input type="text" name="name" value="{{$products->name}}" class="form-control">

            </div>
      
            <div class="form-group">
               
                <!-- Label  -->
                <label>
                    Product Image
                </label>

                <!-- Input -->
                <input type="file" name="image"  class="form-control">

            </div>

            <div class="form-group">
               
                <!-- Label  -->
                <label>
                    Description
                </label>

                <!-- Input -->
                <input type="text" name="description" value="{{$products->description}}" class="form-control">

            </div>

          

            <div class="form-group">
               
                <!-- Label  -->
                <label>
                    price
                </label>

                <!-- Input -->
                <input type="number" name="price" value="{{$products->price}}" class="form-control">

            </div>

            <!-- Divider -->
            <hr class="mt-5 mb-5">

            <!-- Buttons -->
            <input type="submit" name="submit" value="Update Category" class="btn btn-block btn-primary">

            {{-- <a href="#" class="btn btn-block btn-primary">
                Create project
            </a> --}}
        

        </form>

    </div>
</div> <!-- / .row -->
</div>

  @endsection
