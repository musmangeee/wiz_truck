@extends('layouts.admin')

@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
       
       
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <div class="content">
    <div class="clearfix"></div>
        <div class="clearfix"></div>
    <div class="card">
      <div class="card-header">
        <ul class="nav nav-tabs align-items-end card-header-tabs w-100">
             
                          <li class="nav-item">
            <a class="nav-link active" ><i class="fa fa-pencil mr-2"></i>Edit Restaurant Review</a>
          </li>
        </ul>
      </div>
      <div class="card-body">

        <form method="POST" action="{{ route('updateReviews' , $review->id) }}" >
            @csrf
            {{-- @method('PUT') --}}
        <div class="row">
          <div style="flex: 50%;max-width: 50%;padding: 0 4px;" class="column">
  <!-- Review Field -->


  <div class="form-group row ">
    <label for="review" class="col-3 control-label text-right">Review</label>
    <div class="col-9">
      <textarea class="form-control" placeholder="Insert Review" name="text" cols="50" rows="10" >{{ $review -> text }}</textarea>
      <div class="form-text text-muted">Insert Review</div>
    </div>
  </div>
  
  <!-- Rate Field -->
  <div class="form-group row ">
    <label for="rate" class="col-3 control-label text-right">Rate</label>
    <div class="col-9">
      <input class="form-control" placeholder="Insert Rate" name="stars" type="number" value="{{ $review ->stars }}" id="rate" >
      <div class="form-text text-muted">
        Insert Rate
      </div>
    </div>
  </div>
  </div>
  <div style="flex: 50%;max-width: 50%;padding: 0 4px;" class="column">
  
  <!-- User Id Field -->
  <div class="form-group row ">
    <label for="user_id" class="col-3 control-label text-right">User</label>
    <div class="col-9">
      <select class="select2 form-control" id="" name="user_id">
        
          @foreach ($user as $item)
          <option value="{{ $item->id }}">{{ $item->name }}</option>
          @endforeach
        </select>
      <div class="form-text text-muted">Insert User</div>
    </div>
  </div>
  
  
  <!-- Restaurant Id Field -->
  <div class="form-group row ">
    <label for="restaurant_id" class="col-3 control-label text-right">Restaurant</label>
    <div class="col-9">
      <select class="select2 form-control" id="restaurant_id" name="business_id">
        @foreach ($business as $item)
        <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
      </select>
      <div class="form-text text-muted">Insert Restaurant</div>
    </div>
  </div>
  
  </div>
  <!-- Submit Field -->
  <div class="form-group col-12 text-right">
    <button type="submit" class="btn btn-primary" ><i class="fa fa-save"></i> Update Restaurant Review</button>
    <a  class="btn btn-default" href="{{ route('business.index') }}"><i class="fa fa-undo"></i> Cancel</a>
  </div>
        </div>
        </form>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <div id="mediaModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header align-items-stretch">
                  <h5 class="modal-title flex-grow-1">Media Library</h5>
                  <div style="width: 250px;" id="selectCollection" class="ml-auto mr-3">
                      <select name="collection_name" id="collection_name" class="form-control select2">
                      </select>
                  </div>
  
                  <div id="resizeItems" class="ml-auto btn-group">
                      <button type="button" data-size="2" class="btn btn-outline-secondary"><i class="fa fa-th"></i></button>
                      <button type="button" data-size="3" class="btn btn-primary"><i class="fa fa-th-large"></i></button>
                      <button type="button" data-size="4" class="btn btn-outline-secondary"><i class="fa fa-square"></i></button>
                  </div>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="row medias-items">
                      <div class="card loader">
                          <div class="overlay">
                              <i class="fa fa-refresh fa-spin"></i>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <span>Select file to upload it</span>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
  </div>

  @endsection
