@extends('layouts.frontend')

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
                                Business Documents
                            </h6>

                            <!-- Title -->
                            <h1 class="header-title">
                                Please Submit User Business Documents
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
            <form class="mb-4" method="POST" action="{{route('business_document.store')}}" enctype="multipart/form-data">

            @csrf
               
                <div class="form-group">

                    <!-- Label  -->
                    <label>
                        Business License
                    </label>

                    <!-- Input -->
                    <input type="file" name="license" class="form-control" required>
               
                </div>

                <div class="form-group">

                    <!-- Label  -->
                    <label>
                        Commercial General Liability Insurance
                    </label>

                    <!-- Input -->
                    <input type="file" name="liability_insurance" class="form-control" required>
               
                </div>

                <div class="form-group">

                    <!-- Label  -->
                    <label>
                        Health Permit
                    </label>

                    <!-- Input -->
                    <input type="file" name="health_permit" class="form-control" required>
               
                </div>

                <div class="form-group">

                    <!-- Label  -->
                    <label>
                        Void Check
                    </label>

                    <!-- Input -->
                    <input type="file" name="void_check" class="form-control" required>
               
                </div>

                <div class="form-group">

                    <!-- Label  -->
                    <label>
                        W-9 Form
                    </label>

                    <!-- Input -->
                    <input type="file" name="w9_form" class="form-control" required>
               
                </div>

                <!-- Divider -->
                <hr class="mt-5 mb-5">

                <!-- Buttons -->
                <input type="submit" name="submit" value="Submit Documents" class="btn btn-block btn-primary">

                {{-- <a href="#" class="btn btn-block btn-primary">
                    Create project
                </a> --}}
                {{-- <a href="{{route('business_category.index')}}" class="btn btn-block btn-link text-muted">

                    Cancel this Category
                </a> --}}

            </form>

        </div>
    </div> <!-- / .row -->
</div>

@endsection




