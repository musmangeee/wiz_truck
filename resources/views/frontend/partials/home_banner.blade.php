<header class="w-100 pt-3 wiztruck-hero" style="background: linear-gradient(135deg, rgba(0, 0, 0, 0.73), rgba(0, 0, 0, 0.2)), url('{{ asset('frontend/img/banner/'.$data['pref_wallpaper']) }}');background-repeat: no-repeat;
                background-position: center;
                background-size: cover;">
    <div class="container h-100">
        <nav class="navbar navbar-expand-xl navbar-dark mb-2 bg-transparent border-0">
            <div class="container-fluid">

                <!-- Brand -->
                <!-- Brand -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('frontend/img/logos/logo-2.png') }}" alt="">
                </a>
                <ul class="navbar-nav mr-auto ml-5">
                    @guest
                    <div class="row d-lg-none">
                        <a href="{{route('login')}}" class="nav-link">Login</a>
                        <a href="{{route('register')}}" class="btn btn-primary text-white px-4">Sign Up</a>
                    </div>


                    @else
                    <li class="nav-item dropdown d-lg-none">

                        <a class="nav-link dropdown-toggle  text-white" href="#" id="navbarDropdownMenuLink5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

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

                <!-- Toggler -->
                <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> -->

                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Nav -->
                    <ul class="navbar-nav mr-auto">

                        @guest


                        <li class="nav-item">
                            <a href="{{route('login')}}" class="nav-link">Login</a>
                        </li>
                        <li class="nav-item ml-lg-4">
                            <a href="{{route('register')}}" class="btn btn-primary text-white px-4">Sign Up</a>
                        </li>

                        @else
                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle  text-white" href="#" id="navbarDropdownMenuLink5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

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
                                
                                <li><a class="dropdown-item" href="{{ url('setting') }}"><i class="fa fa-sign pr-2"></i>Go to Dashboard</a></li>
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


        <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <form action="{{route('search')}}" method="GET" class="col-12">
                    <div class="input-group mb-3 mt-5"  id="locator-input-section">
                        <input type="text" id="autocomplete" class="autocomplete_locations form-control" name="location" placeholder="Enter Your Address" autocomplete="off">
                        
                        <div class="input-group-prepend">
                            <i aria-hidden="true" class="dot circle outline link icon" id="locator-button" style="margin-top:10%"></i>
                            <button class="btn btn-primary rounded-right" type="submit"><i class="fe fe-search mx-3"></i></button>
                        </div>
                    </div>

                    <ul class="nav justify-content-center mt-4">
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="#">
                                Find Foodtruck Now
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="#">
                                Book Event
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="#">
                                Get the App You’ll love it!
                            </a>
                        </li>
                    </ul>
                    <ul class="nav justify-content-center mt-4">
                        <li class="nav-item">
                            <h2 class="text-white"> Get the App You’ll love it!</h2>
                            
                        </li>
                    </ul>
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