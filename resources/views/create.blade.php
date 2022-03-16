@extends('layouts.app')
@section('content')
<div class="container">
    <form action="/teststore" method="POST" enctype="multipart/form-data"  >
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Page') }}

                    </div>

                        <div class="card-body">
                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" value="{{old('title')}}" class="form-control" id="title" >
                                    @error("title")
                                    <p style="color:red">{{$errors->first("title")}}</p>
                                    @enderror
                                </div>
                            </div>
                                <div class="form-group row">
                                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="description" aria-label="With textarea">{{old('description')}}</textarea>
                                            @error("description")
                                            <p style="color:red">{{$errors->first("description")}}</p>
                                            @enderror
                                        </div>
                                </div>
                                <div class="input-group mb-6">
                                    <input type="file" name="upload" value="{{old('upload')}}" class="form-control" id="inputGroupFile02">
                                    <label class="input-group-text" for="inputGroupFile02">Upload Image</label>
                                    @error("upload")
                                    <p style="color:red">{{$errors->first("upload")}}</p>
                                    @enderror
                                </div>
                            <button type="submit" class="btn btn-secondary mt-2">Add Items</button>            
                        </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
