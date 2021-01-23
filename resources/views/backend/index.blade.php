@extends('layouts.frontend')

@section('style')
    <style>
        .rating {
            font-size: 1rem;
        }
    </style>
@endsection

@section('content')

    @include('frontend.partials.default_banner')



    <!-- CARDS -->
    <div class="container mt-5">

        @if(Auth::user()->email_verified_at == null)
            <div class="alert alert-light lift" role="alert">
                <div class="row">
                    <div class="col-auto">
                        <i class="fa fa-envelope text-secondary h1 mb-0"></i>
                    </div>
                    <div class="col-10">
                        Looks like you still have to confirm your account. Any reviews you write won’t be posted until you do.
                        Check your inbox and spam folders for a confirmation email, or click here to resend.
                    </div>
                </div>
            </div>
        @endif
            @if(Auth::user()->claim != "")
          <div class="alert alert-light lift" role="alert">
                <div class="row">
                    <div class="col-auto">
                        <i class="fa fa-store text-secondary h1 mb-0"></i>
                    </div>
                    <div class="col-10">
                        Thank you for claiming your business, we are checking your claim, will notify you soon.
                    </div>
                </div>
            </div>
                  @endif
        @if(Session::has('success'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
        @endif
        @if(Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
        @endif
        <div class="row">
            <div class="col-md-8">

                <!-- Value  -->


            </div>
            <div class="col-md-4">
                <h2 class="heading text-primary">Been to these businesses recently?</h2>
              
            </div>
        </div>
        <!-- / .row -->

    </div>


@endsection