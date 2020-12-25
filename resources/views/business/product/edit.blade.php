@extends('layouts.business')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-8">

            <!-- Header -->
            <div class="header mt-md-5">
                <div class="header-body">
                    <div class="row align-items-center">
                        <div class="col">

                            <!-- Pretitle -->
                            <h6 class="header-pretitle">
                                Product
                            </h6>

                            <!-- Title -->
                            <h1 class="header-title">
                               Update Product
                            </h1>

                        </div>
                    </div> <!-- / .row -->
                </div>
            </div>
            @if(Session::has('success'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
            @endif
            @if(Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
            @endif

            <!-- Form -->
            <form role="form" action="{{route('products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                @csrf

                <!-- Project name -->
                <div class="form-group">

                    <!-- Label  -->
                    <label>
                        Product name
                    </label>

                    <!-- Input -->
                    <input type="text" name="name" value="{{$product->name}}" class="form-control">

                </div>
                <div class="form-group">

                    <!-- Label  -->
                    <label>
                        Product Description
                    </label>

                    <!-- Input -->
                    <input type="text" name="description" value="{{$product->description}}" class="form-control">

                </div>
                <div class="form-group">

                    <!-- Label  -->
                    <label>
                        Product Price
                    </label>

                    <!-- Input -->
                    <input type="text" name="price" value="{{$product->price}}" class="form-control">

                </div>
                <div class="form-group">

                    <!-- Label  -->
                    <label>
                        Product Discount
                    </label>

                    <!-- Input -->
                    <input type="text" name="discount" value="{{$product->discount}}" class="form-control">

                </div>
                <div class="form-group">
                   
                    <!-- Label  -->
                    <label> 
                        Preview Image
                    </label>

                    <!-- Input -->
                    <br/>
                    <img height="60px" src=" {{asset('public\business_product/'. $product->image)}}"/>

                </div>
                <div class="form-group">
                   
                    <!-- Label  -->
                    <label>
                        Product Image
                    </label>

                    <!-- Input -->
                    <input type="file" name="image" value="{{$product->image}}" class="form-control">

                </div>

                <!-- Divider -->
                <hr class="mt-5 mb-5">

                <!-- Buttons -->
                <input type="submit" name="submit" value="Update Category" class="btn btn-block btn-primary">

                {{-- <a href="#" class="btn btn-block btn-primary">
                    Create project
                </a> --}}
                <a href="{{route('products.index')}}" class="btn btn-block btn-link text-muted">
                    Cancel this Category
                </a>

            </form>

        </div>
    </div> <!-- / .row -->
</div>

@endsection

