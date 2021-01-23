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
                                New Menu
                            </h6>

                            <!-- Title -->
                            <h1 class="header-title">
                                Create a new Menu
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
            <form class="mb-4" method="POST" action="{{route('menu.store')}}" enctype="multipart/form-data">

            @csrf
                <!-- Project name -->
                <div class="form-group">

                    <!-- Label  -->
                    <label>
                        Menu 
                    </label>

                    <!-- Input -->
                    <input type="text" name="name" class="form-control">

                </div>
                <!-- Project name -->
         
                <!-- Divider -->
                <hr class="mt-5 mb-5">

                <!-- Buttons -->
                <input type="submit" name="submit" value="Create Menu" class="btn btn-block btn-primary">

                {{-- <a href="#" class="btn btn-block btn-primary">
                    Create project
                </a> --}}
                <a href="{{route('menu.index')}}" class="btn btn-block btn-link text-muted">

                    Cancel this Menu
                </a>

            </form>

        </div>
    </div> <!-- / .row -->
</div>

@endsection
