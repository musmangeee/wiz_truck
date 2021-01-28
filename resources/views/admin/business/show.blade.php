@extends('layouts.admin')

@section('content')

<!-- HEADER -->
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
                        Dashboard
                    </h1>

                </div>

            </div>
            <!-- / .row -->
        </div>
        <!-- / .header-body -->

    </div>
</div>
<!-- / .header -->

<!-- CARDS -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-lg-6 col-xl">

            <!-- Value  -->
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">

                            <!-- Title -->
                            <h6 class="text-uppercase text-muted mb-2">
                                Total Orders
                            </h6>

                            <!-- Heading -->
                            <span class="h2 mb-0">
                                {{ $order }}
                            </span>

                        </div>
                        <div class="col-auto">

                            <!-- Icon -->
                            <span class="h2 fe fe-star text-muted mb-0"></span>

                        </div>
                    </div>
                    <!-- / .row -->
                </div>
            </div>

        </div>
        <div class="col-12 col-lg-6 col-xl">

            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">

                            <!-- Title -->
                            <h6 class="text-uppercase text-muted mb-2">
                                Canceled Orders
                            </h6>

                            <!-- Heading -->
                            <span class="h2 mb-0">
                                {{ $canceled }}
                            </span>

                        </div>
                        <div class="col-auto">

                            <!-- Icon -->
                            <span class="h2 fe fe-star text-muted mb-0"></span>

                        </div>
                    </div>
                    <!-- / .row -->
                </div>
            </div>

        </div>
        <div class="col-12 col-lg-6 col-xl">

            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">

                            <!-- Title -->
                            <h6 class="text-uppercase text-muted mb-2">
                                Pending Orders
                            </h6>

                            <!-- Heading -->
                            <span class="h2 mb-0">
                                {{ $pending }}
                            </span>

                        </div>
                        <div class="col-auto">

                            <!-- Icon -->
                            <span class="h2 fe fe-star text-muted mb-0"></span>

                        </div>
                    </div>
                    <!-- / .row -->
                </div>
            </div>

        </div>
        <div class="col-12 col-lg-6 col-xl">

            <!-- Time -->
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">

                            <!-- Title -->
                            <h6 class="text-uppercase text-muted mb-2">
                                Total earnings
                            </h6>

                            <!-- Heading -->
                            <span class="h2 mb-0">
                                {{ $total_orders }}
                            </span>

                        </div>
                        <div class="col-auto">

                            <!-- Icon -->
                            <span class="h2 fe fe-star text-muted mb-0"></span>

                        </div>
                    </div>
                    <!-- / .row -->
                </div>
            </div>

        </div>

    </div>

    {{-- Row1 --}}
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">
                <!-- Form -->
                <form role="form" action="{{route('business.update',$business->id)}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
    
                    <!-- Project name -->
                    <div class="form-group">
                        <!-- Label  -->
                        <label>
                            Business Name
                        </label>
                        <!-- Input -->
                        <input type="text" name="name" value="{{$business->name}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <!-- Label  -->
                        <label>
                            Business Url
                        </label>
                        <!-- Input -->
                        <input type="url" name="url" value="{{$business->url}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <!-- Label  -->
                        <label>
                            Business ZipCode
                        </label>
                        <!-- Input -->
                        <input type="text" name="zipcode" value="{{$business->zipcode}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <!-- Label  -->
                        <label>
                            Business Phone
                        </label>
                        <!-- Input -->
                        <input type="text" name="phone" value="{{$business->phone}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <!-- Label  -->
                        <label>
                            Business Address
                        </label>
                        <!-- Input -->
                       <textarea name="address" id="" rows="5" cols="75">{{$business->address}}</textarea>
                    </div>
                    <div class="form-group">
                        <!-- Label  -->
                        <label>
                            Business Email
                        </label>
                        <!-- Input -->
                        <input type="email" name="phone" value="{{$business->email}}" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Business</button>
                </form>    
            </div>
        </div> <!-- / .row -->
    </div>
    
    </div>
    <br><br>
    <!-- / .row -->
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header no-border">
                    <h3 class="card-title">Documents</h3>
                    <div class="card-tools">
                        <a href="{{ route('business.index') }}" class="btn btn-tool btn-sm"><i class="fa fa-bars"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body p-0 ">
                    {{-- <table class="table table-striped table-valign-middle">
                        <thead>
                            <tr>
                                <th>Business License</th>
                                <th>Commercial General Liability Insurance</th>
                                <th>Health Permit</th>
                                <th>VOID check</th>
                                <th>W-9 Form</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>                                
                                <td> <button class="btn btn-primary">Download</button></td>
                                <td> <button class="btn btn-primary">Download</button></td>
                                <td> <button class="btn btn-primary">Download</button></td>
                                <td> <button class="btn btn-primary">Download</button></td>
                                <td> <button class="btn btn-primary">Download</button></td>
                            </tr>

                        </tbody>
                    </table> --}}

                   
  
        
                        <!-- Project name -->
                        <div class="form-group" style="margin-left: 5%">
                            <!-- Label  -->
                            <label>
                               <b> Business License</b>
                            </label>
                            <!-- Input -->
                            <br>
                            
                            <a href="" class="btn btn-primary" >Download</a>
                         
                        </div>
                        <div class="form-group" style="margin-left: 5%">
                            <!-- Label  -->
                            <label>
                               <b> Commercial General Liability Insurance</b>
                            </label>
                            <br>
                            <!-- Input -->
                          <button class="btn btn-primary">Download</button>
                        </div>
 
                        <div class="form-group" style="margin-left: 5%">
                            <!-- Label  -->
                            <label>
                               <b> Business Phone</b>
                            </label>
                            <br>
                            <!-- Input -->
                            <button class="btn btn-primary">Download</button>
                        </div>
                        <div class="form-group" style="margin-left: 5%">
                            <!-- Label  -->
                            <label>
                               <b> VOID check</b>
                            </label>
                            <br>
                            <!-- Input -->
                            <button class="btn btn-primary">Download</button>
                        </div>
                        <div class="form-group" style="margin-left: 5%">
                            <!-- Label  -->
                            <label>
                               <b> W-9 Form</b>
                            </label>
                            <br>
                            <!-- Input -->
                            <button class="btn btn-primary">Download</button>
                        </div>
                    
                
                </div>


                
            </div>
        </div>
    </div>










    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header no-border">
                    <h3 class="card-title">Menu</h3>
                    <div class="card-tools">
                        <a href="{{ route('business.index') }}" class="btn btn-tool btn-sm"><i class="fa fa-bars"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-valign-middle">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($menus as $menu)
                                <tr>                                
                                    <td>{{$menu->name}}</td>
                                    <td> <a href="{{route('menu.edit', $menu->id)}}"
                                        class="btn btn-warning btn-sm lift"><i class="fe fe-edit"></i></a>
                                     <form action="{{ route('menu.destroy', $menu->id)}}" method="post"
                                           class="d-inline-block">
                                         @csrf
                                         @method('DELETE')
                                         <button class="btn btn-danger btn-sm lift" type="submit"><i class="fe fe-trash"></i>
                                         </button>
                                     </form></td>
                                </tr> 
                                
                               
                                @endforeach
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header no-border">
                    <h3 class="card-title">Products</h3>
                    <div class="card-tools">
                        <a href="{{ route('business.index') }}" class="btn btn-tool btn-sm"><i class="fa fa-bars"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-valign-middle">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach ($menus as $menu)
                                <tr>                                
                                    <td>{{$menu->name}}</td>
                                    <td> <a href="{{route('menu.edit', $menu->id)}}"
                                        class="btn btn-warning btn-sm lift"><i class="fe fe-edit"></i></a>
                                     <form action="{{ route('menu.destroy', $menu->id)}}" method="post"
                                           class="d-inline-block">
                                         @csrf
                                         @method('DELETE')
                                         <button class="btn btn-danger btn-sm lift" type="submit"><i class="fe fe-trash"></i>
                                         </button>
                                     </form></td>
                                </tr> 
                                
                               
                                @endforeach
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>


@endsection
