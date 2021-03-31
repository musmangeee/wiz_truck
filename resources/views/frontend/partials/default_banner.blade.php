<header class="w-100 pt-3 border-bottom fixed-top bg-white">
    <div class="container">
        <nav class="navbar navbar-expand-xl navbar-light mb-2 bg-transparent border-0">
            <div class="container-fluid">

                <!-- Brand -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('frontend/img/logos/logo-2.png') }}" alt="">
                </a>
                <!-- Toggler -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Nav -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item pr-lg-2">
                            <a href="{{ url('my/business/create') }}" class="nav-link text-dark">For Businesses</a>
                        </li>
                        <li class="nav-item pr-lg-3">
                            <a href="{{url('write_a_review')}}" class="nav-link text-dark">Write A Review</a>
                        </li>

                        @guest

                        <li class="nav-item">
                            <a href="{{route('login')}}" class="nav-link">Login</a>
                        </li>
                        <li class="nav-item ml-lg-4">
                            <a href="" class="btn btn-primary px-4">Sign Up</a>

                        </li>

                        @else
                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle text-dark  pt-1" href="#" id="navbarDropdownMenuLink5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <div class="avatar avatar-sm  mr-2">
                                    @if(auth()->user()->avatar)
                                    <img src=" {{ auth()->user()->avatar }}" alt="avatar-img rounded-circle" width="32" height="32" style="margin-right: 8px;; border-radius: 50%">
                                    @else
                                    <span class="avatar-title rounded-circle">@php echo explode(" ", Auth::user()->name)[0][0] . explode(" ", Auth::user()->name)[1][0]; @endphp</span>
                                    @endif
                                </div>


                                {{ explode(' ', auth()->user()->name, 2)[0] }} <span class="caret"></span>

                            </a>
                            <ul class="dropdown-menu dropdown-menu-lg-right">
                                <li><a class="dropdown-item" href="{{ url('home') }}"><i class="fa fa-user pr-2"></i>About Me</a></li>
                                <li><a class="dropdown-item" href="{{ url('my/reviews') }}"><i class="fa fa-star pr-2"></i>My Reviews</a></li>
                                <li><a class="dropdown-item" href="{{ url('setting') }}"><i class="fa fa-sign pr-2"></i>Account Settings</a></li>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pr-2"></i>Logout</a></li>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </ul>

                    </li>
                    @endguest
                    </ul>

                </div>

            </div>
        </nav>
        <div class="container h-100 text-centermt-3">
            <div class="row h-100 justify-content-center align-items-center">
                <form action="{{route('search')}}" method="GET" class="col-12">
                   
                   
                    <div class="input-group mb-3 mt-3"  id="locator-input-section">
                        <input type="text" id="autocomplete" class="autocomplete_locations form-control" name="location" placeholder="Enter Your Address" autocomplete="off">
                       
                        <input type="hidden" id="longitude" name="longitude">
                        <input type="hidden" id="latitude" name="latitude">

                        <div class="input-group-prepend">
                            <i aria-hidden="true" class="dot circle outline link icon" id="locator-button" style="margin-top:10%"></i>
                            <button class="btn btn-primary rounded-right" type="submit"><i class="fe fe-search mx-3"></i></button>
                        </div>
                    </div>

                   
                   
                </form>
            </div>

        </div>

    </div>

</header>

@section('script')

<script type="text/javascript">
    jQuery(document).ready(function() {
        function set_location() {
            let location = $('#location').val();
            console.log(location)
            $.ajax({
                url: "{{route('search')}}",
                type: 'GET',
                // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
                data: {
                    location: location,
                },
                success: function(data) {

                }
            })
        }

        set_location()

        $('#location').on('change', function() {
            set_location()
        });
    });
</script>
@endsection