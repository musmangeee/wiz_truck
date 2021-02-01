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
                           
                            <th>Name</th>
                            <th>Price Per Person</th>
                         
                        </tr>
                        </thead>
                        <tbody>
                      
                        @foreach ($events as $e)
                           <tr>
                               <td>
                                {{ $e->name  }}
                               </td>
                               <td>
                                {{ $e->price_per_person }}
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

