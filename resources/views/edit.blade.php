@extends('layouts.app')
@section('content')
<div class="container">
    <form action="/testupdate" method="POST" enctype="multipart/form-data"  >
    <input type="hidden" name="_token"  value="{{ csrf_token() }}">
    <input type="hidden" name="id"  value="{{ $data->id }}">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Page') }}
                        
                    </div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="title" class="form-control" value="{{$data->title}}" id="title" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description" aria-label="With textarea">{{$data->description}}</textarea>
                            </div>
                        </div>
                        <img  class="img-thumbnail" style="width:150px" src="{{url('/images/'.$data->image)}}" /> 
                        <div class="input-group mb-6">
                          
                            <input type="file" name="upload" class="form-control" id="inputGroupFile02">
                            <label class="input-group-text" for="inputGroupFile02">Upload Image</label>
                        </div>
                        <button type="submit" class="btn btn-secondary mt-2">Update</button>                
                    </div>

                </div>
            </div>
        </div>
    </form>
</div>
@endsection
