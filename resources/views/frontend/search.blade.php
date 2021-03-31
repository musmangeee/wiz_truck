@extends('layouts.frontend')

@section('content')
@include('frontend.partials.default_banner')
<section>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-7">
            
                @foreach ($data['search_results'] as $result)
                <div class="card lift">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <!-- Avatar -->
                                <a href="{{ url('list-business', $result->slug)  }}" class="avatar avatar-xxl avatar-5by3 avatar-business">
                                    <img src="{{ asset('backend/assets/img/avatars/profiles/avatar-2.jpg') }}" alt="..." class="avatar-img rounded ">
                                </a>
                            </div>
                            <div class="col ml-n2">
                                <!-- Title -->
                                <h3 class="mb-2">
                                    <a href="{{ url('list-business', $result->slug)  }}">{{$result->name}}</a>
                                </h3>
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="{{ url('write_a_review/'. $result->id) }}">
                                            <div class="rating text-primary " data-rate-value="@if(sizeof($result->reviews) > 1){{ floor((($result->reviews->sum('stars')/sizeof($result->reviews))*2)/2 ) }} @else 0 @endif"></div>
                                        </a>
                                    </div>
                                    <div class="col text-secondary total-reviews">
                                        {{ sizeof($result->reviews) }}
                                    </div>
                                </div>
                                <p class="text-secondary">
                                    @foreach($result->categories as $c)
                                    <span class="badge badge-danger">{{$c->name}}</span>
                                    @endforeach
                                </p>
                                <!-- Text -->
                                <p class="small text-muted mb-1">
                                    <a href="tel:" class="text-primary">Phone: {{$result->phone}}</a> 
                                </p>
                                <!-- Text -->
                                <p class="small text-muted mb-1">
                                    <span class="text-primary">Address: </span> {{$result->address}}
                                </p>
                            </div>

                        </div> <!-- / .row -->


                    </div> <!-- / .card-body -->
                    
                </div>
                @endforeach
                {{-- {{ $data['search_results']->appends(Request::all())->render() }} --}}
            </div>
            
            <div class="col-md-5 p-0 ">
                <div id="" class="w-100 sticky-top" style="height: 90vh;">
                    <div id="business_map_canvas" class="h-100 w-100">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('frontend.partials.footer')
@endsection


@section('script')
<script src="{{ URL::asset('backend/assets/js/maps.js') }}"></script>
@endsection