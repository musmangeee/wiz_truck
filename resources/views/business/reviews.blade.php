@extends('layouts.frontend')

@section('content')

    @include('frontend.partials.business_banner')
    <!-- HEADER -->
    <div class="header">
        <div class="container">

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
                            Business Review
                        </h1>

                    </div>
                    
                </div> <!-- / .row -->
            </div> <!-- / .header-body -->

        </div>
    </div>

    <!-- CARDS -->
    <div class="container-fluid">
        {{-- @if(Session::has('success'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
        @endif
        @if(Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
        @endif --}}

        <div class="card">
            <div class="card-body">
                <table class="table table-sm table-nowrap">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User</th>
                        <th scope="col">Business</th>
                        <th scope="col">Review</th>
                        <th scope="col">Rate</th>
                        <th scope="col">Updated</th>
                        <th scope="col">Created</th>
                        <th scope="col">Action</th>
                       
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($review as $r)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <th>{{ $r->user->name ??"" }}</th> 
                            <th> {{ $r->business->name ??"" }}</th>
                            <th><span  class="text-wrap">{{ $r->text }}</span>
                                </th> 
                            <th>{{ $r->stars }}</th> 
                            <th>{{ $r->updated_at }}</th> 
                            <td>{{  \Carbon\Carbon::parse($r->created_at)->diffForhumans()  }}</td>

                            <td>
                                <a href="{{route('businessreview.edit', $r->id)}}"
                                   class="btn btn-warning btn-sm lift"><i class="fe fe-edit"></i></a>
                                <form action="{{ route('dltReviews', $r->id)}}" method="post"
                                      class="d-inline-block">
                                    @csrf
                                   
                                    <button class="btn btn-danger btn-sm lift   " type="submit"><i class="fe fe-trash"></i>
                                    </button>
                                </form>
                            </td>
                            </tr>

                            
                    @endforeach
                    </tbody>
                </table>
                 {{ $review->links() }}
            </div>
        </div>
    </div>


@endsection