
@extends('layouts.app');

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.btn{
    margin-left:15px !important;
    margin-top:5px !important;
}

</style>

<div class="container">
   
    <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                    <a class="btn btn-primary mb-2  col-md-2 ml-5" href="testcreate">create new article</a>

    <form  method="post" action="/menu" class="form-inline">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group mx-sm-3 mb-2">
                <label >Home Page Selected</label>
                    <select  name="menu" class="form-control col-sm-10">

                        @foreach ($tests as $option)

                        @if($option->status==1)     
                            <option  value="{{  $option->id }}" selected="selected"> {{  $option->title }}</option>
                       
                        @else
                             <option value="{{  $option->id }}"> {{  $option->title }}</option>

                        @endif      
                        @endforeach
                    </select>
            </div>
        <button type="submit" class="btn btn-primary mb-2">Save</button>
    </form>
                    </div>
                </div>
    </div>

   
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Page') }}</div>
                        <div class="card-body">
                            <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tests as $test)
                                    <tr>
                                    <th scope="row">{{  $test->id }}</th>
                                    <td><a href="/testshow/{{$test->id}}">{{  $test->title }}</a></td>
                                    <td>{{  $test->description }}</td>
                                    <td><img class="img-thumbnail" style="width:150px" src="{{url('/images/'.$test->image)}}" alt="Image"/>{{  $test->image }}</td>
                                    <td>
                                    <a href="/testdelete/{{$test->id}}"> <i class="fa fa-trash" aria-hidden="true"></i></a>
                                    <a href="/testedit/{{$test->id}}"> <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    </td>
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
@endsection