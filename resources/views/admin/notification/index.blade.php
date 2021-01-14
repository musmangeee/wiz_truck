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
                               Notification  
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
                           
                            <th>Type</th>
                            <th>Notification Type</th>
                            <th>Data</th>
                            <th>ReadAT</th>
                            {{-- <th>Created At</th>
                            <th>Action</th> --}}
                        </tr>
                        </thead>
                        <tbody>
                      
                        @foreach ($notification as $item)
                            <tr>
                                
                                <td>{{$item->tyle}}</td>
                                <td>{{$item->notification_type}}</td>
                                <td>{{$item->data}}</td>
                                <td>{{$item->read_at}}</td>
                             
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $notification->links() }} --}}
                </div>
            </div>
        </div>
    </div>

@endsection

