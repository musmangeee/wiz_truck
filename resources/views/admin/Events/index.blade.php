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
                               Events
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
                           
                            <th>Business</th>
                            <th>User</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                      
                        @foreach ($events as $e)
                           <tr>
                               <td>
                                {{ $e->restaurant->name  }}
                               </td>
                               <td>
                                {{ $e->user->name }}
                            </td>
                            <td>
                                {{  \Carbon\Carbon::parse($e->start_date)->diffForhumans()  }}
                            </td>
                            <td>
                                {{  \Carbon\Carbon::parse($e->end_date)->diffForhumans()  }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::createFromFormat('H:i:s',$e->start_time)->format('h:i') }}
                                
                            </td>
                            <td>
                                {{-- {{ \Carbon\Carbon::parse($e->end_time)->diffForhumans() }} --}}
                                {{ \Carbon\Carbon::createFromFormat('H:i:s',$e->end_time)->format('h:i') }}
                            </td>
                            <td>
                                <span class="badge badge-primary">{{ $e->status }}</span>
                            </td>
                           </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $events->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection

