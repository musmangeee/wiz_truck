@extends('layouts.frontend')

@section('content')
@include('frontend.partials.home_banner')

<section>
<div class="container text-center py-5 mt-5">
        <h2 class="h1">FoodTruck Near Me!</h2>
        <div class="row mt-5">

@for($a = 0; $a<3; $a++)
    <div class="col-lg-4 col-sm-6">
        <a href="{{ url('search?find='.urlencode($data['random_categories'][$a]['name'])) }}"
           class="card cat-card lift">
            <!-- Image -->
            <img src="{{ asset('public/images/img2.jpg'.$data['random_categories'][$a]['']) }}" alt="..."
                 class="card-img-top">
            <!-- Body -->
            <div class="card-body py-3 text-left">
                <!-- Heading -->
                <h4 class="card-title text-dark">
                     McDonald's® (609 Market St) <span class="badge badge-secondary float-right">4.5</span>
                </h4>
                <p class="text-dark">$1.49 Delivery Fee. 20–30 Min</p>
            </div>
        </a>
    </div>
@endfor


</div>
<div class="container text-center py-5 mt-5">
    <h2 class="h1">New on Wiz Truck</h2>
    <div class="row mt-5">

 @foreach ($restaurants as $key =>  $item)

<div class="col-lg-4 col-sm-6" >
    <a href="{{url('list-business') . '/' . $item->id}}"
       class="card cat-card lift">
        <!-- Image -->
       
             
        <!-- Body -->
        <div class="card-body py-3 text-left">
            <!-- Heading -->
            <h4 class="card-title text-dark">
                {{$item->name}} <span class="badge badge-secondary float-right">4.5</span>
            </h4>
            <p class="text-dark">{{$item->address}}</p>
            @foreach($item->categories as $category)
            {{$category->name}},
             @endforeach
        
            
        </div>
    </a>
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
            <img src="{{ asset('storage/1.svg') }}" alt="..."
                 class="card-img-top">
            <!-- Body -->
            <div class="card-body py-3 text-left">
                <!-- Heading -->
                <h3 class="card-title text-dark">
              Get food on mobile
                </h3>
                <a href="{{ url('/login') }}" class="btn btn-info">Register Now</a>
              
            </div>
        </a>
    </div>

    <div class="col-lg-4 col-sm-6">
        <a
           class="card cat-card lift">
            <!-- Image -->
            <img src="{{ asset('storage/2.svg') }}" alt="..."
                 class="card-img-top">
            <!-- Body -->
            <div class="card-body py-3 text-left">
                <!-- Heading -->
                <h3 class="card-title text-dark">
                Start your business
                </h3>
                <a href="{{ route('Businessregister') }}" class="btn btn-info">Register Now</a>
            </div>
            
        </a>
    </div>

    <div class="col-lg-4 col-sm-6">
        <a href="{{ url('search?find='.urlencode($data['random_categories'][$a]['name']).'&location=') }}"
           class="card cat-card lift">
            <!-- Image -->
            <img src="{{ asset('storage/3.svg') }}" alt="..."
                 class="card-img-top">
            <!-- Body -->
            <div class="card-body py-3 text-left">
                <!-- Heading -->
                <h3 class="card-title text-dark">
                Deliver the Eats
                </h3>
                <a class="btn btn-info" href="{{ route('ridderSignup') }}"> Register Now</a>
              
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
    $(document).ready(function() {
        $(".rating").rate({
            update_input_field_name: $(".review_value"),
        });
    });
</script>

@endsection