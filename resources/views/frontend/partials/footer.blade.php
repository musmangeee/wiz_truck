@if(Session::has('success'))

<!-- The Modal -->
<div class="modal modal-sm offset-5" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>



            <div class="modal-body text-center p-5">
                <h1 class="modal-title ">{{ Session::get('success') }}</h1>
            </div>
        </div>
    </div>
</div>
@endif
@if(Session::has('error'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
@endif
<footer class="new_footer_area bg_color">
    <div class="new_footer_top">
        <div class="container">
            <div class="row">
            <div class="col-lg-3 col-md-6">
                    <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
                        <h3 class="f-title f_600 t_color f_size_18">Download</h3>
                        <ul class="list-unstyled f_list">
                            <li><a href="#">Company</a></li>
                            <a href="#"> <img src="public/storage/playstore.jpg" height="25px"></a>
                            <a href="#"> <img src="public/storage/appstore.png" height="25px"></a>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
                        <h3 class="f-title f_600 t_color f_size_18">About Us</h3>
                        <ul class="list-unstyled f_list">
                      
                            <li><a href="{{ route('Businessregister') }}">Create a Business Account</a></li>
                           
                            <li><a href="{{ url('/login') }}">Login to User</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="f_widget about-widget pl_70 wow fadeInLeft" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInLeft;">
                        <h3 class="f-title f_600 t_color f_size_18">Help</h3>
                        <ul class="list-unstyled f_list">
                            <li><a href="{{url('faq')}}">FAQ</a></li>
                            <li><a href="{{url('terms_conditions')}}">Term &amp; conditions</a></li>
                           
                            
                            <li><a href="{{url('privacy_policy')}}">Privacy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="f_widget social-widget pl_70 wow fadeInLeft" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInLeft;">
                        <h3 class="f-title f_600 t_color f_size_18">Team Solutions</h3>
                        <div class="f_social_icon">
                            <a href="#" class="fab fa-facebook"></a>
                            <a href="#" class="fab fa-twitter"></a>
                            <a href="#" class="fab fa-linkedin"></a>
                            <a href="#" class="fab fa-pinterest"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bg">
            <div class="footer_bg_one"></div>
            <div class="footer_bg_two"></div>
        </div>
    </div>
    <div class="footer_bottom">
  
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-7">
                    
                    <p class="mb-0 f_400">© <a href="https://wiztruck.com/">Weanio Technologies</a> 2020 All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>

@section('script')
<script>
    $(document).ready(function() {
        $('#myModal').modal('show')
    })
</script>
@endsection