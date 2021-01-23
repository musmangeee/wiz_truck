@extends('layouts.business')

@section('content')

  <!-- HEADER -->
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
                          Dashboard
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
  <div class="container-fluid">
      <div class="row">
          <div class="col-12 col-lg-6 col-xl">

              <!-- Value  -->
              <div class="card">
                  <div class="card-body">
                      <div class="row align-items-center">
                          <div class="col">

                              <!-- Title -->
                              <h6 class="text-uppercase text-muted mb-2">
                                  Order
                              </h6>

                              <!-- Heading -->
                              <span class="h2 mb-0">
                                {{$orders}} 
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
                                  Completed Order 
                              </h6>

                              <!-- Heading -->
                              <span class="h2 mb-0">
                                 {{$completed_order}}
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
                                  Pending Order
                              </h6>

                              <!-- Heading -->
                              <span class="h2 mb-0">
                                  {{$pending_order}}
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
                                  Net Income
                              </h6>

                              <!-- Heading -->
                              <span class="h2 mb-0">
                                 {{$total}}
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

  </div>


@endsection