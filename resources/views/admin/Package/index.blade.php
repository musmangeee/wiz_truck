@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="header">
            <div class="container-fluid">

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
                               Packages
                            </h1>

                        </div>
                       
                    </div> <!-- / .row -->
                </div> <!-- / .header-body -->

            </div>
        </div>
       

        <div class="card">
            <div class="card-body">

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-sm table-nowrap card-table text-secondary">
                        <thead>
                        <tr>
                           
                            <th>Name</th>
                            <th>Event</th>
                            <th>Booking Fee</th>
                           
                        </tr>
                        </thead>
                        <tbody>
                      
                        @foreach ($package as $p)
                           <tr>
                               <td>
                                {{ $p->name }}
                               </td>
                               <td>
                                {{ $p->event->name }}
                            </td>
                            <td>
                                {{ $p->booking_fee }}
                            </td>
                          
                           </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $events->links() }} --}}
                </div>
            </div>
        </div>
    </div>

@endsection

