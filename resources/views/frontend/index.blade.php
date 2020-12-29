@extends('layouts.frontend')

@section('content')
@include('frontend.partials.home_banner')

<section>

<div class="container text-center py-5 mt-5">
       

@for($a = 0; $a<3; $a++)
   
@endfor



<div class="container text-center py-5 mt-5">
    <h2 class="h1">New on Wiz Truck</h2>
    <div class="row mt-5">

 @foreach ($restaurants as $key =>  $item)

<div class="col-lg-4 col-sm-6" >
    <div 
       class="card cat-card lift">
        <!-- Image -->
        <img  height="230px" width="300px" src="{{asset('public/business_images/'.$item->images[0]['name']) }}  " alt="..."
  
             class="card-img-top">
             
        <!-- Body -->
        <div class="card-body py-3 text-left">
            <!-- Heading -->
           
                <div class="row">
                   
                  <div class="col-sm-7">
                    <a href="{{ url('write_a_review/'. $item->id) }}">
                        <div class="rating text-primary "
                             data-rate-value="@if(sizeof($item->reviews) > 1){{ floor((($item->reviews->sum('stars')/sizeof($item->reviews))*2)/2 ) }} @else 0 @endif"></div>
                    </a>
                  </div>
                  <div class="col-sm-5">
                    <span class="badge badge-secondary mt-3">
                        {{ sizeof($item->reviews) }} Reviews Total
                    </span>
                  </div>
                  
                </div>


                

                <a href="{{url('list-business') . '/' .$item->id}}" class="card-title h3">{{ $item->name }}</a>
          
        
       
            <p class="text-dark">{{$item->address}}</p>
            @foreach($item->categories as $category)
            {{$category->name}},
             @endforeach
        
            
        </div>
    </div>
</div>
@endforeach



    </div>

    



        <div class="container text-center py-5 mt-5">
            <h2 class="h1">Find the best that's suits you!</h2>
            <div class="row mt-5">


                <div class="col-lg-4 col-sm-6">
                    <a href="{{ url('search?find='.urlencode($data['random_categories'][$a]['name']).'&location=') }}"
                        class="card cat-card lift">
                        <!-- Image -->
                        <img src="{{ asset('public/frontend_image/1.svg') }}" alt="..." class="card-img-top">
                        <!-- Body -->
                        <div class="card-body py-3 text-left">
                            <!-- Heading -->
                            <h3 class="card-title text-dark">
                                Get food on mobile
                            </h3>

                            <form action="{{ url('/login') }}">
                                <button type="submit" class="btn btn-info" /> Register now
                            </form>

                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <a class="card cat-card lift">
                        <!-- Image -->
                        <img src="{{ asset('public/frontend_image/2.svg') }}" alt="..." class="card-img-top">
                        <!-- Body -->
                        <div class="card-body py-3 text-left">
                            <!-- Heading -->
                            <h3 class="card-title text-dark">
                                Start your business
                            </h3>

                            <form action="{{ route('Businessregister') }}">
                                <button type="submit" class="btn btn-info" /> Register now
                            </form>

                        </div>

                    </a>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <a href="{{ url('search?find='.urlencode($data['random_categories'][$a]['name']).'&location=') }}"
                        class="card cat-card lift">
                        <!-- Image -->
                        <img src="{{ asset('public/frontend_image/3.svg') }}" alt="..." class="card-img-top">
                        <!-- Body -->
                        <div class="card-body py-3 text-left">
                            <!-- Heading -->
                            <h3 class="card-title text-dark">
                                Deliver the Eats
                            </h3>

                            <form action="{{ route('ridderSignup') }}">
                                <button type="submit" class="btn btn-info" /> Register now
                            </form>


                        </div>
                    </a>
                </div>


            </div>
        </div>
    </div>
</section>


@include('frontend.partials.footer')
@endsection
<!-- Libs JS -->

@section('script')

<script>
    $(document).ready(function () {
        $(".rating").rate({
            update_input_field_name: $(".review_value"),
        });
    });

</script>

@endsection
