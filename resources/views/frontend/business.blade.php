@extends('layouts.frontend')

@section('style')
<style>
    /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
    .StripeElement {
        box-sizing: border-box;
        height: 40px;
        padding: 10px 12px;
        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
</style>

@endsection




@section('content')
    @include('frontend.partials.default_banner')

<script type="text/javascript">
      
     $(document).ready(function(){
         $('#BtnCart').click(function(){
             alert('cliecked');
         });

     });

</script>




@if(Session::has('success'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
@endif
@if(Session::has('error'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
@endif

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
              

            



            {{-- model --}}


            <!-- Button trigger modal -->

  
  <!-- Modal -->







            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header border-0">
                       
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    <div class="modal-body">
                   
                       

               

                <form class="tab-content py-6" role="form" id="wizardSteps" action="{{route('booking.store')}}" method="POST"
                        enctype="multipart/form-data" data-cc-on-file="false" data-stripe-publishable-key="pk_test_51HJOqaFbtkGc4x7hioioAihztNfPkMtbGymnFayhWp9n8EKVY8kGgjMruOhdb65YEtCdzNthxB1lu6QSfiNvzlkD00l3jeG0QN" name="frmStripe" id="frmstripe"
                       >
                        @csrf
            
                      <div class="tab-pane fade show active" id="wizardStepOne" role="tabpanel"
                           aria-labelledby="wizardTabOne">
            
                          <!-- Header -->
                          <div class="row justify-content-center">
                              <div class="col-12 col-md-10  text-center">
               
                                  <!-- Pretitle -->
                                  <h6 class="mb-4 text-uppercase text-muted">
                                      Step 1 of 9
                                  </h6>
            
                                  <!-- Title -->
                                  <h1 class="mb-3">
                                    Who's Paying
                                  </h1>
                                  
                                 <input type="hidden" name="business_id" value="{{$business->id}}">
                                
                        
                              </div>
                          </div> <!-- / .row -->
            
                          <!-- Team name -->
                          <div class="form-group signup_town">
                          </div>
            
                        <div class="row">
                          
                          <!-- Team description -->
                          <div class="form-group">
            
                            <!-- Label -->
                            <div class="card" style="width: 18rem; margin-right:35px; margin-left:20px;">
                                <div class="card-body" style="text-align: center">
                                    <img src="{{asset('public/images/user.png')}}" style="height:50px"/>
                                 
                                  <p class="card-text"></p>
                                  <input class="form-check-input" type="radio" name="payer" id="flexRadioDefault1" required value="host">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Host
                                </label>
                                </div>
                              </div>
                         </div>
            
                             <div class="form-group">
            
                            <!-- Label -->
                            <div class="card" style="width: 18rem;">
                                <div class="card-body" style="text-align: center">
                                 
                                 <img src="{{asset('public/images/people.png')}}" style="height:50px"/>
                                  <p class="card-text"></p>
                                  <input class="form-check-input" type="radio" name="payer" required id="flexRadioDefault2" value="guest">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                       Guest
                                    </label>
                                </div>
                              </div>
                            
                        </div>
            
                    </div>
                     <!-- Divider -->
                          <hr class="my-5">
            
                          <!-- Footer -->
                          <div class="row align-items-center">
                              <div class="col-auto">
            
                                  <!-- Button -->
                                  <button class="btn btn-lg btn-white" type="reset">Cancel</button>
            
                              </div>
                              <div class="col text-center">
            
                                  <!-- Step -->
                                  <h6 class="text-uppercase text-muted mb-0">Step 1 of 9</h6>
            
                              </div>
                              <div class="col-auto">
            
                                  <!-- Button -->
                                  <a class="btn btn-lg btn-primary" data-toggle="wizard"
                                     href="#wizardStepTwo">Continue</a>
            
                              </div>
                          </div>
            
                      </div>
            
                      {{-- Section 2  --}}
            
                      <div class="tab-pane fade" id="wizardStepTwo" role="tabpanel" aria-labelledby="wizardTabTwo">
            
                          <!-- Header -->
                          <div class="row justify-content-center">
                              <div class="col-12 col-md-10  text-center">
            
                                  <!-- Pretitle -->
                                  <h6 class="mb-4 text-uppercase text-muted">
                                      Step 2 of 9
                                  </h6>
            
                                  <!-- Title -->
                                  <h1 class="mb-3">
                                    Where is your event?
                                  </h1>
            
                             
            
                              </div>
                          </div> <!-- / .row -->
            
                  
                   
                
                          <!-- Team description -->
                          <div class="form-group">
            
                              <!-- Label -->
                              {{-- <label class="mb-1">
                                  Business Phone Number
                              </label> --}}
            
                              <textarea type="text" name="address" class="form-control" required placeholder="Event Address"
                                     required></textarea>
                          </div>
                                <!-- Team description -->
                          <div class="form-group">
                                <input type="number" name="zip_code" class="form-control" required placeholder="Zip Code" >
                          </div>
            
                            <!-- Team description -->
                          <!-- Divider -->
                          <hr class="my-5">
            
                          <!-- Footer -->
                          <div class="row align-items-center">
                              <div class="col-auto">
            
                                  <!-- Button -->
                                  <a class="btn btn-lg btn-white" data-toggle="wizard" href="#wizardStepOne">Back</a>
            
                              </div>
                              <div class="col text-center">
                                     <!-- Step -->
                                  <h6 class="text-uppercase text-muted mb-0">Step 2 of 9</h6>
            
                              </div>
                              <div class="col-auto">
            
                                  <!-- Button -->
                                  <a class="btn btn-lg btn-primary" data-toggle="wizard"
                                     href="#wizardStepThree">Continue</a>
            
                              </div>
                          </div>
            
                      </div>
                        


                      <div class="tab-pane fade" id="wizardStepThree" role="tabpanel" aria-labelledby="wizardTabThree">
            
                          <!-- Header -->
                          <div class="row justify-content-center">
                              <div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">
            
                                  <!-- Pretitle -->
                                  <h6 class="mb-4 text-uppercase text-muted">
                                      Step 3 of 9
                                  </h6>
            
                                  <!-- Title -->
                                  <h1 class="mb-3">
                                    Event Date
                                  </h1>
            
            
                              </div>
                          </div> <!-- / .row -->
            
            
                          <!-- Divider -->
                          <hr class="mt-5 mb-5">
            
                          <div class="col-md-12">
              
                         <div class="form-group">
                             <label>Start Date</label>
                            <input type="date" class="form-control" name="start_date"  required placeholder="Start Date">
                        </div>
                        <div class="form-group">
                            <label>End Date</label>
                           <input type="date" class="form-control" name="end_date"  required placeholder="End Date">
                       </div>
                         <div class="form-group">
                            <label>Start time</label>
                            <input type="time" class="form-control" name="start_time"  required placeholder="Start Time">
                        </div>
            
                         <div class="form-group">
                            <label>End time</label>
                            <input type="time" class="form-control" name="end_time"  required placeholder="End Time">
                        </div>
            
                    
            
                          
                           
            
                          </div> <!-- / .row -->
            
                          <!-- Divider -->
                          <hr class="my-5">
            
                          <!-- Footer -->
                          <div class="row align-items-center">
                              <div class="col-auto">
            
                                  <!-- Button -->
                                  <a class="btn btn-lg btn-white" data-toggle="wizard" href="#wizardStepTwo">Back</a>
            
                              </div>
                              <div class="col text-center">
            
                                  <!-- Step -->
                                  <h6 class="text-uppercase text-muted mb-0">Step 3 of 9</h6>
            
                              </div>
                              <div class="col-auto">
            
                                  <!-- Button -->
                                  {{-- !! --}}

                                  <a class="btn btn-lg btn-primary" data-toggle="wizard"
                                  href="#wizardStepfour">Continue</a>
         
                                  {{-- <button class="btn btn-lg btn-primary" type="submit">Create</button> --}}
            
                              </div>
                          </div>
                          {{--  --}}
            
                      </div>


                      <div class="tab-pane fade" id="wizardStepfour" role="tabpanel" aria-labelledby="wizardTabThree">
            
                        <!-- Header -->
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">
          
                                <!-- Pretitle -->
                                <h6 class="mb-4 text-uppercase text-muted">
                                    Step 4 of 10
                                </h6>
          
                                <!-- Title -->
                                <h1 class="mb-3">
                                    Occasion
                                </h1>
          
          
                            </div>
                        </div> <!-- / .row -->
          
          
                        <!-- Divider -->
                        <hr class="mt-5 mb-5">
          
                        <div class="col-md-12">
            
                            
                   
                        <div class="radio">
                            <label><input type="radio" name="occasion" required value="concert"> &nbsp; Concert</label>
                          </div>
                          <div class="radio">
                            <label><input type="radio" name="occasion" required value="festival">&nbsp; Festival</label>
                          </div>
                          <div class="radio">
                            <label><input type="radio" name="occasion" required value="individual">&nbsp; An individual business
                            </label>
                          </div>
                          <div class="radio">
                            <label><input type="radio" name="occasion" required value="non-profit">&nbsp; Non-profit event
                            </label>
                          </div>
                          <div class="radio">
                            <label><input type="radio" name="occasion"required value="sport">&nbsp;Sporting event
                            </label>
                          </div>
                          <div class="radio">
                            <label><input type="radio" name="occasion" required value="school">&nbsp; School event</label>
                          </div>
                        </div> <!-- / .row -->
          
                        <!-- Divider -->
                        <hr class="my-5">
          
                        <!-- Footer -->
                        <div class="row align-items-center">
                            <div class="col-auto">
          
                                <!-- Button -->
                                <a class="btn btn-lg btn-white" data-toggle="wizard" href="#wizardStepthree">Back</a>
          
                            </div>
                            <div class="col text-center">
          
                                <!-- Step -->
                                <h6 class="text-uppercase text-muted mb-0">Step 4 of 10</h6>
          
                            </div>
                            <div class="col-auto">
          
                                <!-- Button -->
                                {{-- !! --}}

                                <a class="btn btn-lg btn-primary" data-toggle="wizard"
                                href="#wizardStepfive">Continue</a>
       
                                {{-- <button class="btn btn-lg btn-primary" type="submit">Create</button> --}}
          
                            </div>
                        </div>
                        {{--  --}}
          
                    </div>
                     
                   


                    


                 






                    <div class="tab-pane fade" id="wizardStepfive" role="tabpanel" aria-labelledby="wizardTabThree">
                       <!-- Header -->
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">
                               <!-- Pretitle -->
                                <h6 class="mb-4 text-uppercase text-muted">
                                    Step 5 of 10
                                </h6>
                                     <!-- Title -->
                                <h1 class="mb-3">
                                    Event
                                </h1>
                            </div>
                        </div> <!-- / .row -->
                        <!-- Divider -->
                        <hr class="mt-5 mb-5">
                         <div class="col-md-12">
                            <div class="form-group">
                               <div class="row">
                                <div class="card" style="margin-right:40px; margin-left:30px;">
                                    <div class="card-header"style="
                                    width: 14rem">
                                      <h3 class="text-center">Standard</h3>
                                      <h5></h5>
                                    </div>
                                                            
                                    <div class="card-body">
                                      <h5 class="card-title text-center">Packages</h5>
                                      @foreach ($standard_packages as $key => $s_package)
                                   
                                      <div class="mt-5">
                                        
                                            <input type="radio" class="get_package_id" name="package_id" value="{{$s_package->id}}"> &nbsp;<label>{{$s_package->name}}</label><br/>
                                            
                                        </div>
                                      @endforeach  
                                    </div>
                                    <div>  
                            </div>                       
                                
                                </div> 
                                 {{-- card2 --}}
                                 <div class="card">
                                    <div class="card-header" style="
                                    width: 16rem">
                                      <h3 class="text-center">VIP</h3>

                                    </div>
                                                            
                                    <div class="card-body">
                                      <h5 class="card-title text-center">Packages</h5>
                                      @foreach ($vip_packages as $key => $v_package)
                                      <div class="mt-5">
                                        <input type="radio" class="get_package_id" name="package_id" value="{{$v_package->id}}"> &nbsp; <label>{{$v_package->name}}</label><br/>
                                      
                                    </div>    
                                    @endforeach   
                                    </div>
                                </div>
                               </div>
                            </div> 
                        </div>
                         <!-- / .row -->
                        <!-- Divider -->
                        <hr class="my-5">
                        <!-- Footer -->
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <!-- Button -->
                                <input type="button" id="btn" value="Show Selected Value">
                                <a class="btn btn-lg btn-white" data-toggle="wizard" href="#wizardStepfour">Back</a>
                            </div>
                            <div class="col text-center">
                            <!-- Step -->
                            <h6 class="text-uppercase text-muted mb-0">Step 5 of 10</h6>
                                </div>
                            <div class="col-auto">
                                <!-- Button -->
                                {{-- !! --}}
                                    <a class="btn btn-lg btn-primary" data-toggle="wizard"
                                href="#wizardStepsix">Continue</a>
                                    {{-- <button class="btn btn-lg btn-primary" type="submit">Create</button> --}}
                            </div>
                        </div>
                        {{--  --}}
                    </div>




                    <div class="tab-pane fade" id="wizardStepsix" role="tabpanel" aria-labelledby="wizardTabThree">
                        <!-- Header -->
                         <div class="row justify-content-center">
                             <div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">
                                <!-- Pretitle -->
                                 <h6 class="mb-4 text-uppercase text-muted">
                                     Step 5 of 9
                                 </h6>
                                      <!-- Title -->
                                 <h1 class="mb-3">
                                     Eaters
                                 </h1>
                             </div>
                         </div> <!-- / .row -->
                         <!-- Divider -->
                         <hr class="mt-5 mb-5">
                          <div class="col-md-12">
                             <div class="form-group">
                                 <label>Eaters</label>
                                 <input type="number" class="form-control" name="eaters"  required placeholder="Eaters" id="test">
                             </div> 
                         </div> <!-- / .row -->
                         <!-- Divider -->
                         <hr class="my-5">
                         <!-- Footer -->
                         <div class="row align-items-center">
                             <div class="col-auto">
                                 <!-- Button -->
                                 <a class="btn btn-lg btn-white" data-toggle="wizard" href="#wizardStepfive">Back</a>
                             </div>
                             <div class="col text-center">
                             <!-- Step -->
                             <h6 class="text-uppercase text-muted mb-0">Step 6 of 10</h6>
                                 </div>
                             <div class="col-auto">
                                 <!-- Button -->
                                 {{-- !! --}}
                                     <a class="btn btn-lg btn-primary" id="get_package" data-toggle="wizard"
                                 href="#wizardStepseven">Continue</a>
                                     {{-- <button class="btn btn-lg btn-primary" type="submit">Create</button> --}}
                             </div>
                         </div>
                         {{--  --}}
                     </div>
 



                    <div class="tab-pane fade" id="wizardStepseven" role="tabpanel" aria-labelledby="wizardTabThree">
                        <!-- Header -->
                         <div class="row justify-content-center">
                             <div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">
                                <!-- Pretitle -->
                                 <h6 class="mb-4 text-uppercase text-muted">
                                    Step 7 of 9
                                 </h6>
                                      <!-- Title -->
                                 <h1 class="mb-3">
                                    What are we serving?
                                 </h1>
                             </div>
                         </div> <!-- / .row -->
                         <!-- Divider -->



                       
                         <hr class="mt-5 mb-5">
                          <div class="col-md-12">
                             <div class="form-group">
                                @foreach ($menus as $key => $menu)
                                <div class="form-check">
                                   
                                    <input class="form-check-input" name="menu_id[]" type="checkbox" value="{{$menu->name}}" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                       {{$menu->name}}
                                    </label>
                                  </div>
                                  @endforeach
                                
                                
                                 
                             </div> 
                         </div> <!-- / .row -->
                         <!-- Divider -->
                         <hr class="my-5">
                         <!-- Footer -->
                         <div class="row align-items-center">
                             <div class="col-auto">
                                 <!-- Button -->
                                 <a class="btn btn-lg btn-white" data-toggle="wizard" href="#wizardStepsix">Back</a>
                             </div>
                             <div class="col text-center">
                             <!-- Step -->
                             <h6 class="text-uppercase text-muted mb-0">Step 7 of 9</h6>
                                 </div>
                             <div class="col-auto">
                                 <!-- Button -->
                                 {{-- !! --}}
                                     <a class="btn btn-lg btn-primary" data-toggle="wizard"
                                 href="#wizardStepeight">Continue</a>
                                     {{-- <button class="btn btn-lg btn-primary" type="submit">Create</button> --}}
                             </div>
                         </div>
                         {{--  --}}
                     </div>



                     {{-- six  --}}
                     <div class="tab-pane fade" id="wizardStepeight" role="tabpanel" aria-labelledby="wizardTabThree">
                        <!-- Header -->
                         <div class="row justify-content-center">
                             <div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">
                                <!-- Pretitle -->
                                 <h6 class="mb-4 text-uppercase text-muted">
                                    Step 8 of 9
                                 </h6>
                                      <!-- Title -->
                                 <h1 class="mb-3">
                                     User Details
                                 </h1>
                             </div>
                         </div> <!-- / .row -->
                         <!-- Divider -->
                         <hr class="mt-5 mb-5">
                          <div class="col-md-12">
                             <div class="form-group">
                                 <label>Phone Number</label>
                                 <input type="number" class="form-control" name="phone_number"  required placeholder="Phone Number">
                             </div> 
                         </div> <!-- / .row -->
                         <!-- Divider -->
                         <hr class="my-5">
                         <!-- Footer -->
                         <div class="row align-items-center">
                             <div class="col-auto">
                                 <!-- Button -->
                                 <a class="btn btn-lg btn-white" data-toggle="wizard" href="#wizardStepseven">Back</a>
                             </div>
                             <div class="col text-center">
                             <!-- Step -->
                             <h6 class="text-uppercase text-muted mb-0">Step 8 of 9</h6>
                                 </div>
                             <div class="col-auto">
                                 <!-- Button -->
                                 {{-- !! --}}
                                     <a class="btn btn-lg btn-primary" data-toggle="wizard"
                                 href="#wizardStepnine">Continue</a>
                                     {{-- <button class="btn btn-lg btn-primary" type="submit">Create</button> --}}
                             </div>
                         </div>
                         {{--  --}}
                     </div>




 
                     <div class="tab-pane fade" id="wizardStepnine" role="tabpanel" aria-labelledby="wizardTabThree">
                        <!-- Header -->
                         <div class="row justify-content-center">
                             <div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">
                                <!-- Pretitle -->
                                 <h6 class="mb-4 text-uppercase text-muted">
                                    Step 9 of 9
                                 </h6>
                                      <!-- Title -->
                                 <h1 class="mb-3">
                                     Final Details
                                 </h1>
                             </div>
                         </div> <!-- / .row -->
                         <!-- Divider -->
                         <hr class="mt-5 mb-5">
                          <div class="col-md-12">
                             <div class="form-group">
                                 <label>Final Details</label>
                                 <input type="test" class="form-control" name="final_detail" placeholder="Additional Question">
                             </div> 
                         </div> <!-- / .row -->
                         <!-- Divider -->
                         <hr class="my-5">
                         <!-- Footer -->
                         <div class="row align-items-center">
                             <div class="col-auto">
                                 <!-- Button -->
                                 <a class="btn btn-lg btn-white" data-toggle="wizard" href="#wizardStepeight">Back</a>
                             </div>
                             <div class="col text-center">
                             <!-- Step -->
                             <h6 class="text-uppercase text-muted mb-0">Step 9 of 10</h6>
                                 </div>
                             <div class="col-auto">
                                 <!-- Button -->
                                 {{-- !! --}}
                                 <a class="btn btn-lg btn-primary" data-toggle="wizard"
                                 href="#wizardStepten">Continue</a>
                                    
                             </div>
                         </div>
                         {{--  --}}
                     </div>
 
  {{-- six  --}}


                    <div class="tab-pane fade" id="wizardStepten" role="tabpanel" aria-labelledby="wizardTabThree">
                        <!-- Header -->
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">
                                <!-- Pretitle -->
                                <h6 class="mb-4 text-uppercase text-muted">
                                    Step 10 of 10
                                </h6>
                                    <!-- Title -->
                                <h1 class="mb-3">
                                    Payment Details
                                </h1>
                            </div>
                        </div> <!-- / .row -->
                        <!-- Divider -->
                        <hr class="mt-5 mb-5">
                        <div class="col-md-12">
                            {{-- payment --}}
                            <div class="row">
                                <div class="col-lg-12 form-group">
                                    <label>Name on Card</label>
                                    <input class="form-control" size="4" type="text">
                                </div>
                            
                            
                                <div class="col-lg-12 form-group">
                                    <label>Card Number</label>
                                    <input autocomplete="off" class="form-control" size="20" type="text" name="card_no">
                                </div>
                            
                            
                                <div class="col-lg-4 form-group">
                                    <label>CVC</label>
                                    <input autocomplete="off" class="form-control" placeholder="ex. 311" size="3" type="text" name="cvv">
                                </div>
                                <div class="col-lg-4 form-group">
                                    <label>Expiration Month</label>
                                    <input class="form-control" placeholder="MM" size="2" type="text" name="expiry_month">
                                </div>
                                <div class="col-lg-4 form-group">
                                    <label>Expiration Year </label>
                                    <input class="form-control" placeholder="YYYY" size="4" type="text" name="expiry_year">
                                </div>
                            </div>
                            
                     
    
                          
                       
                            {{-- endpayment --}}

                        </div> <!-- / .row -->
                        <!-- Divider -->
                        <hr class="my-5">
                        <!-- Footer -->
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <!-- Button -->
                                <a class="btn btn-lg btn-white" data-toggle="wizard" href="#wizardStepeight">Back</a>
                            </div>
                            <div class="col text-center">
                            <!-- Step -->
                            <h6 class="text-uppercase text-muted mb-0">Step 9 of 10</h6>
                                </div>
                            <div class="col-auto">
                                <!-- Button -->
                                {{-- !! --}}
                                {{-- <a class="btn btn-lg btn-primary" data-toggle="wizard"
                                href="#wizardStepten">Continue</a> --}}

                                <button class="btn btn-lg btn-primary" id="complete-order" type="submit">Create</button>
                                    
                            </div>
                        </div>
                        {{--  --}}
                    </div>





                  </form>
                  
                        
                    </div>
                   
                </div>
                </div>
            </div>


  {{-- model end --}}

 
  
                <div class="col-md-4 mt-n5">
                    @if(Auth::check())
                    <button class="btn btn-primary btn-block mt-5" data-toggle="modal" data-target="#staticBackdrop">Book Event</button>
                   @else
                   <a href="{{ route ('login')}}" class="btn btn-primary btn-block mt-5">Book Event</a>
            
                   @endif
                    <div class="pt-5">
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
@section('script')
<!-- Libs JS -->

{{-- <script>
    cardElement.mount('#card-element');
</script> --}}
<script src="https://js.stripe.com/v3/"></script>
<script>
// $("#get_package").click(function(){
//     var package = $('.get_package_id').val();
//     console.log(package);

// });
        // Create a Stripe client
            var stripe = Stripe('');
            
                // Create an instance of Elements
                var elements = stripe.elements();
            
                // Custom styling can be passed to options when creating an Element.
                // (Note that this demo uses a wider set of styles than the guide below.)
                var style = {
                    base: {
                        color: '#32325d',
                        lineHeight: '18px',
                        fontFamily: '"Roboto", Helvetica Neue", Helvetica, sans-serif',
                        fontSmoothing: 'antialiased',
                        fontSize: '16px',
                        '::placeholder': {
                            color: '#aab7c4'
                        }
                    },
                    invalid: {
                        color: '#fa755a',
                        iconColor: '#fa755a'
                    }
                };
            
                // Create an instance of the card Element
                var card = elements.create('card', {
                    style: style
                });
            
                // Add an instance of the card Element into the `card-element` <div>
                card.mount('#card-element');
            
                // Handle real-time validation errors from the card Element.
                card.addEventListener('change', function(event) {
                    var displayError = document.getElementById('card-errors');
                    if (event.error) {
                        displayError.textContent = event.error.message;
                    } else {
                        displayError.textContent = '';
                    }
                });
            
                // Handle form submission
                var form = document.getElementById('wizardSteps');
                form.addEventListener('submit', function(event) {
                    event.preventDefault();
            
                    // Disable the submit button to prevent repeated clicks
                    // document.getElementById('save_add').disabled = true;
            
                    var options = {
                        name: document.getElementById('name_on_card').value,
            
                    }
            
                    stripe.createToken(card, options).then(function(result) {
                        if (result.error) {
                            // Inform the user if there was an error
                            var errorElement = document.getElementById('card-errors');
                            errorElement.textContent = result.error.message;
            
                            // Enable the submit button
                            document.getElementById('complete-order').disabled = false;
                        } else {
                            // Send the token to your server
                            stripeTokenHandler(result.token);
                        }
                    });
                });
            
                function stripeTokenHandler(token) {
                    // Insert the token ID into the form so it gets submitted to the server
                    var form = document.getElementById('wizardSteps');
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', token.id);
                    form.appendChild(hiddenInput);
            
                    // Submit the form
                    form.submit();
                }
            </script>


@endsection