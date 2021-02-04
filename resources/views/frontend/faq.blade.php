@extends('layouts.frontend')

@section('content')
@include('frontend.partials.default_banner')
<section style="margin-top: 10rem">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
               <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    what is wiztruck?
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                wiztruck connects people with great local businesses.
                            </div>
                        </div>
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

