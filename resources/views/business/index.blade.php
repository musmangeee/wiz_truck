@extends('layouts.frontend')

@section('content')

    @include('business.partials.business_banner')
    <!-- HEADER -->
    <div class="header">
        <div class="container">
    
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
                            {{ Auth::user()->business->name }}
                        </h1>

                    </div>
                    <div class="col-auto">

                        <!-- Button -->
                        <a href="#!" class="btn btn-primary lift">
                            Write a Review
                        </a>

                    </div>
                </div>
                <!-- / .row -->
            </div>
            <!-- / .header-body -->

        </div>
    </div>
    <!-- / .header -->

    <!-- CARDS -->
    <div class="container">

        @if(Auth::user()->business->status == 0)
            <div class="alert alert-secondary" role="alert">
                Thank you for registering your business with wiztruck! Your Business is currently under review, you will be notified once your business will be verified!
            </div>
        @endif

        <div class="row">
            <div class="col-12 col-lg-6 col-xl">

                <!-- Value  -->
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h6 class="text-uppercase text-muted mb-2">
                                    Total Reviews
                                </h6>

                                <!-- Heading -->
                                <span class="h2 mb-0">
                                  {{ count(Auth::user()->business->reviews) }}
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
            <div class="col-12 col-lg-6 col-xl">

                <!-- Hours -->
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h6 class="text-uppercase text-muted mb-2">
                                    Total Photos
                                </h6>

                                <!-- Heading -->
                                <span class="h2 mb-0">
                                  0
                              </span>

                            </div>
                            <div class="col-auto">

                                <!-- Icon -->
                                <span class="h2 fe fe-image text-muted mb-0"></span>

                            </div>
                        </div>
                        <!-- / .row -->
                    </div>
                </div>

            </div>
            <div class="col-12 col-lg-6 col-xl">

                <!-- Exit -->
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h6 class="text-uppercase text-muted mb-2">
                                    Exit %
                                </h6>

                                <!-- Heading -->
                                <span class="h2 mb-0">
                                  35.5%
                              </span>

                            </div>
                            <div class="col-auto">

                                <!-- Chart -->
                                <div class="chart chart-sparkline">
                                    <canvas class="chart-canvas" id="sparklineChart"></canvas>
                                </div>

                            </div>
                        </div>
                        <!-- / .row -->
                    </div>
                </div>

            </div>
            <div class="col-12 col-lg-6 col-xl">

                <!-- Time -->
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h6 class="text-uppercase text-muted mb-2">
                                    Avg. Time
                                </h6>

                                <!-- Heading -->
                                <span class="h2 mb-0">
                                  2:37
                              </span>

                            </div>
                            <div class="col-auto">

                                <!-- Icon -->
                                <span class="h2 fe fe-clock text-muted mb-0"></span>

                            </div>
                        </div>
                        <!-- / .row -->
                    </div>
                </div>

            </div>
        </div>
        <!-- / .row -->
        <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-4">
                <div class="card"><div class="card-body">

                        <!-- List group -->
                        <div class="list-group list-group-flush my-n3">
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col">

                                        <!-- Title -->
                                        <h5 class="mb-0">
                                            <i class="fa fa-external-link"></i>
                                        </h5>

                                    </div>
                                    <div class="col-auto">

                                        <a href="{{ Auth::user()->business->url }}" target="_blank">
                                            {{ Auth::user()->business->url }}
                                        </a>


                                    </div>
                                </div> <!-- / .row -->
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col">

                                        <!-- Title -->
                                        <h5 class="mb-0">
                                            <i class="fa fa-phone"></i>
                                        </h5>

                                    </div>
                                    <div class="col-auto">

                                        <!-- Time -->
                                        <span class="small text-muted">
                                                {{ Auth::user()->business->phone }}
                                            </span>

                                    </div>
                                </div> <!-- / .row -->
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col">

                                        <!-- Title -->
                                        <h5 class="mb-0">
                                            <i class="fa fa-store"></i>
                                        </h5>

                                    </div>
                                    <div class="col-auto">


                                        <!-- Time -->
                                        <time class="small text-muted" datetime="1988-10-24">
                                            {{ \Carbon\Carbon::parse(Auth::user()->business->created_at)->diffForhumans() }}
                                        </time>

                                    </div>
                                </div> <!-- / .row -->
                            </div>
                        </div>

                    </div></div>
            </div>
        </div>
    </div>


@endsection