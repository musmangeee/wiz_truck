@extends('layouts.frontend')


@section('content')
    @include('frontend.partials.default_banner')

<script type="text/javascript">
      
     $(document).ready(function(){
         $('#BtnCart').click(function(){
             alert('cliecked');
         });

     });

</script>


    <section style="margin-top:9rem;">
        
        <div style="
        background-image: url({{asset('public/business_images/'.$business->images[0]['name']) }});
        height: 230px;
        width:100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;"></div>
        
        

        <div class="container mt-5">
            <div class="row" >
                <div class="col-md-8"  style="position:relative">
                  
                    <h1 class="header-title business-title mb-0">{{ $business->name }}
                        @if($business->status != 0)
                            <a href="" class="text-secondary h4 font-weight-light">Claimed</a>
                        @else
                            <a href="" class="text-secondary h4 font-weight-light" data-toggle="tooltip"
                               data-placement="top"
                               title="This business has not yet been claimed by the owner or a representative."><i
                                        class="fa fa-info-circle pr-1"></i>Unclaimed</a>
                        @endif
                    </h1>
                    <div class="row">
                        <div class="col-auto">
                            <a href="{{ url('write_a_review/'. $business->id) }}">
                                <div class="rating text-primary "
                                     data-rate-value="@if(sizeof($business->reviews) > 1){{ floor((($business->reviews->sum('stars')/sizeof($business->reviews))*2)/2 ) }} @else 0 @endif"></div>
                            </a>
                        </div>
                        <div class="col text-secondary total-reviews">
                            {{ sizeof($business->reviews) }} Reviews Total
                        </div>
                    </div>

                    @foreach($business->categories as $category) <span class="badge badge-secondary ">{{ $category->name }}</span> @endforeach
                    <br>
                    <br>



                    <div style="position: relative;">
                        
                    <div class="row align-items-center position-sticky">
                        <div class="col">
                
                            <!-- Nav -->
                            <ul class="nav nav-tabs nav-overflow header-tabs">
                                @foreach ($menus as $key => $menu)
                                <li class="nav-item">
                                    <a href="#menu_{{$key}}" class="nav-link">
                                        {{ $menu->name}}
                                    </a>
                                </li>
                                @endforeach
                                
                            </ul>
                
                        </div>
                    </div>
                    </div>

                     <br/>
                     <br/>
                     <div data-spy="scroll">
                     {{-- card --}}
                     @foreach ($menus as $key => $menu)
                    
                     <div id="menu_{{$key}}">
                        <h2>{{$menu->name}}</h2>
                        <div class="row">
                            @foreach ($menu->products as $product)
                            <div class="col-sm-6">
                              <div class="card">
                                <div class="card-body">
                                  <div class="row">
                                   <div class="col-9">     
                                     <h3 class="card-title mb-1">{{$product->name}}</h3>
                                     <small class="card-text text-secondary mb-2">{{$product->description}}</small>
                                     <h4 class="card-title">${{$product->price}}</h4>
                                    
                                     <a href="" data-toggle="modal" data-target="#orderModel" class="btn btn-sm btn-secondary" id="BtnCart" >Add To Cart</a>
                                     {{-- {{route('add-cart', [$product->id])}} --}}
                                    </div>
                                     <div class="col-3">
                                     <img height="60px" width="60px" src="{{asset('public/business_product').'/'.$product->image}}">
                                    
                                    </div>
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
                            @endforeach
                        </div>
                     </div>
                    @endforeach
                </div>
                      
                        
                   

                 <!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="orderModel" tabindex="-1" role="dialog" aria-labelledby="orderModelTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="orderModelTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-check mt-4">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                <label class="form-check-label" for="exampleRadios1">
                  pepsi
                </label>
                </div>
              <div class="form-check mt-4">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                  7upMirinda
                </label>
              </div>
              <div class="form-check mt-4">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                  Mirinda
                </label>
              </div>
              <div class="form-check mt-4">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                  Dew
                </label>
              </div>
                <div class="form-group mt-4">
                  <label for="recipient-name" class="col-form-label">Recipient:</label>
                  <input type="text" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                    <h4>Special instructions</h4>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Any specific preferences? Let the restaurant know.</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>
                </div>
              </form>
        </div>
        <div class="modal-footer">
           <button type="button" class="btn btn-primary">Add To Cart</button>
        </div>
      </div>
    </div>
  </div>





                   
                   
                    @foreach($business->reviews as $review)
                        <div class="card">
                            <div class="card-body">

                                <!-- Header -->
                                <div class="mb-3">
                                    <div class="row align-items-center">
                                        <div class="col-auto">

                                            <!-- Avatar -->
                                            <a href="{{ url('user', $review->user['id']) }}" class="avatar">
                                                <img src="{{ asset('backend/assets/img/avatars/profiles/avatar-1.jpg') }}"
                                                     alt="..." class="avatar-img rounded-circle">
                                            </a>

                                        </div>
                                        <div class="col ml-n2">

                                            <a href="{{ url('user', $review->user['id']) }}">
                                                <!-- Title -->
                                                <h4 class="mb-1">
                                                    {{ $review->user['name'] }}
                                                </h4>
                                            </a>
                                            <!-- Time -->
                                            <p class="card-text small text-muted">
                                                <span class="fe fe-clock"></span>
                                                <time datetime="2018-05-24">{{ \Carbon\Carbon::parse($review->created_at)->diffForhumans() }}</time>
                                            </p>

                                        </div>
                                        <div class="col-auto">

                                            <div class="rating text-primary "
                                                 data-rate-value="{{ $review->stars }}"></div>

                                        </div>
                                    </div> <!-- / .row -->
                                </div>

                                <!-- Text -->

                                <p class="my-3">
                                    " {{ $review->text }}"
                                </p>

                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-4 mt-n5">
                    <div class="sticky-top pt-5">
                        <div class="card">
                            <div class="card-body">

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

                                                <a href="{{ $business->url }}" target="_blank">
                                                    {{ $business->url }}
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
                                                <a href="tel:{{ $business->phone }}" class="small text-muted">
                                                    {{ $business->phone }}
                                                </a>

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
                                                    {{ \Carbon\Carbon::parse($business->created_at)->diffForhumans() }}
                                                </time>

                                            </div>
                                        </div> <!-- / .row -->
                                    </div>
                                </div>

                            </div>
                        </div>
                        @if($business->status == 0)
                            <div class="card">
                                <div class="card-body text-center">
                                    <i class="h1 fa fa-store-alt text-primary"></i>
                                    <h4>Is this your business?</h4>
                                    <p>Claim your business to immediately update business information, respond to
                                        reviews, and more!</p>
                                    <a href="{{ url('claim_business', $business->slug) }}" class="btn btn-white">
                                        Claim This Business
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </section>


@endsection
<!-- Libs JS -->