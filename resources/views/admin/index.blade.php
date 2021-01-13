@extends('layouts.admin')

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
                                  Total Orders
                              </h6>

                              <!-- Heading -->
                              <span class="h2 mb-0">
                                {{ $order }}
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

            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">

                            <!-- Title -->
                            <h6 class="text-uppercase text-muted mb-2">
                                Restaurants
                            </h6>

                            <!-- Heading -->
                            <span class="h2 mb-0">
                              {{ $restaurants }}
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

            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">

                            <!-- Title -->
                            <h6 class="text-uppercase text-muted mb-2">
                                Total clients
                            </h6>

                            <!-- Heading -->
                            <span class="h2 mb-0">
                              {{ $clients }}
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

              <!-- Time -->
              <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">

                            <!-- Title -->
                            <h6 class="text-uppercase text-muted mb-2">
                                Total earnings
                            </h6>

                            <!-- Heading -->
                            <span class="h2 mb-0">
                              10000
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
      </div>
      <!-- / .row -->

  </div>

  <div class="col-lg-6">
    <div class="card">
        <div class="card-header no-border">
            <h3 class="card-title">Food truck</h3>
            <div class="card-tools">
                <a href="https://multi-restaurants.smartersvision.com/restaurants" class="btn btn-tool btn-sm"><i class="fa fa-bars"></i> </a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped table-valign-middle">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Restaurant</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                
                  @foreach ($business as $item)
                  <tr>
                    <td>
                        <img class='img-circle img-size-32 mr-2' style='width:50px' src='{{ asset('public/business_images/'.$item->images[0]['name']) }}' alt='restaurant-2649620_1280'>
                    </td>
                    <td>{{ $item->name  }}</td>
                    <td>
                       {{ $item ->address }}
                    </td>
                    <td class="text-center">
                        <a href="https://multi-restaurants.smartersvision.com/restaurants/1/edit" class="text-muted"> <i class="fa fa-edit"></i> </a>
                    </td>
                </tr>
                  @endforeach
                
                  
                    </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>


@endsection