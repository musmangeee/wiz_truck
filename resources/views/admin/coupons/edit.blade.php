@extends('layouts.admin')

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
                                Coupon
                            </h6>

                            <!-- Title -->
                            <h1 class="header-title">
                                Create a new Coupon
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
            <form class="mb-4" method="POST" action="{{route('coupon.update',$coupon->id)}}" >

            @csrf

   
                <!-- Project name -->
                <div class="form-group">

                    <!-- Label  -->
                    <label>
                        Code
                    </label>

                    <!-- Input -->
                    <input type="text" name="code" class="form-control" value="{{$coupon->code}}"

                </div>
                <!-- Project name -->
                <div class="form-group">

                    <!-- Label  -->
                    <label>
                        Type
                    </label>

                    <!-- Input -->
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="inputGroupSelect01">Options</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="type">
                          <option selected>Choose...</option>
                          <option value="percent">Percent</option>
                          <option value="fixed">Fixed</option>
                        </select>
                      </div>
                    

                </div>

                <div class="form-group">

                    <!-- Label  -->
                    <label>
                        Value
                    </label>

                    <!-- Input -->
                    <input type="number" name="value" class="form-control" value="{{$coupon->value}}">

                </div>

                <div class="form-group">

                    <!-- Label  -->
                    <label>
                        percent_off
                    </label>

                    <!-- Input -->
                    <input type="number" name="percent_off" class="form-control" value="{{$coupon->percent_off}}">

                </div>

                <div class="form-group">

                    <!-- Label  -->
                    <label>
                        Expire Date
                    </label>

                    <!-- Input -->
                    <input type="date" name="expiry_date" class="form-control" >

                </div>
         

                <!-- Divider -->
                <hr class="mt-5 mb-5">

                <!-- Buttons -->
                <input type="submit" name="submit" value="Create Coupon" class="btn btn-block btn-primary">

                {{-- <a href="#" class="btn btn-block btn-primary">
                    Create project
                </a> --}}
               

            </form>

        </div>
    </div> <!-- / .row -->
</div>

@endsection




