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
                             Order 
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title">
                           Order Update
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
        <form role="form" action="{{route('order.update',$order->id)}}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            

            <!-- Project name -->
              <!-- User Id Field -->
  <div class="form-group">
    <label >User</label>
    <div class="col-12">
      <select class="select2 form-control" id="" name="user_id">
        
          @foreach ($user as $item)
          <option value="{{ $item->id }}">{{ $item->name }}</option>
          @endforeach
        </select>
      <div class="form-text text-muted">Insert User</div>
    </div>
  </div>
  
  
  <!-- Restaurant Id Field -->
  <div class="form-group">
    <label>Restaurant</label>
    <div class="col-12">
      <select class="select2 form-control" id="restaurant_id" name="business_id">
        @foreach ($business as $item)
        <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
      </select>
      <div class="form-text text-muted">Insert Restaurant</div>
    </div>
  </div>
      
            

            <div class="form-group">
               
                <!-- Label  -->
                <label>
                    Description
                </label>

                <!-- Input -->
                <input type="status" name="description" value="{{ $order->description }}" class="form-control">

            </div>

            <div class="form-group">
               
                <!-- Label  -->
                <label>
                    Address
                </label>

                <!-- Input -->
                <input type="status" name="address" value="{{ $order->address }}" class="form-control">

            </div>

            <div class="form-group">
               
                <!-- Label  -->
                <label>
                    Order Type
                </label>

                <!-- Input -->
                <input type="status" name="description" value="{{ $order->order_type }}" class="form-control">

            </div>

          

            {{-- <div class="form-group">
               
                <!-- Label  -->
                <label>
                    price
                </label>

                <!-- Input -->
                <input type="number" name="price" value="{{$products->price}}" class="form-control">

            </div> --}}

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
