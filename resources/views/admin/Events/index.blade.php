@extends('layouts.admin')

@section('content')


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
                            Booking
                        </h1>

                    </div>
                    
                </div> <!-- / .row -->
            </div> <!-- / .header-body -->

        </div>
    </div>

    <!-- CARDS -->
    <div class="container-fluid">

        @if(Session::has('success'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
        @endif
        @if(Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
        @endif

        <div class="card"style="
        width: 93rem">
            
            <div class="card-body" >
                <table class="table table-sm table-nowrap">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Payar</th>
                        <th scope="col">address</th>
                        <th scope="col">zip code</th>
                        <th scope="col">start date</th>
                        <th scope="col">end date</th>
                        <th scope="col">start time</th>
                        <th scope="col">end time</th>
                        <th scope="col">occasion</th>
                        <th scope="col">eaters</th>
                        <th scope="col">phone number</th>
                        <th scope="col">final detail</th>

                        {{-- <th scope="col">Details</th> --}}
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                        <tr>
                            <th>{{$booking->id}}</th>
                            <th>{{$booking->payer}}</th>
                            <th>{{$booking->address}}</th>
                            <th>{{$booking->zip_code}}</th>
                            <th>{{$booking->start_date}}</th>
                            <td>{{$booking->end_date}}</td>
                            <td>{{$booking->start_time}}</td>
                            <td>{{$booking->end_time}}</td>
                            <td>{{$booking->occasion}}</td>
                            <td>{{$booking->eaters}}</td>
                            <td>{{$booking->phone_number}}</td>
                            <th>{{$booking->final_detail}}</th>
                                {{-- <td> <a href="{{route('business.edit', $b->id)}}"
                                    class="btn btn-info btn-sm lift far fa-info-circle"></a></td> --}}
                                    
                            <td>
                                      
                                        {{-- <a href="{{route('booking_edit.edit', $booking->id)}}"
                                            class="btn btn-warning btn-sm lift"><i class="fe fe-edit"></i></a> --}}
                                            
                                        {{-- <form action="{{ route('business.destroy', $b->id)}}" method="post"
                                            class="d-inline-block">
                                          @csrf
                                          @method('DELETE')
                                          <button class="btn btn-danger btn-sm lift   " type="submit"><i class="fe fe-trash"></i>
                                          </button>
                                      </form> --}}
                             </td>
                            </tr>
                 @endforeach
                    </tbody>
                </table>
                {{ $bookings->links() }}
            </div>
        </div>
    </div>


@endsection



@section('script')
    <script>
        $(document).ready(function () {
            $('.input-images').imageUploader();
        })
    </script>
@endsection
