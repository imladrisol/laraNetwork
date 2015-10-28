@extends('templates.default')

@section('content')
    <h3>Update your profile</h3>
    <div class="row">
        <div class="col-lg-6">
            <form action="{{route('profile.edit')}}" method="post" role="form" class="form-vertical">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group{{$errors->has('first_name')?' has-error':''}}">
                            <label for="first_name" class="control-label">First name</label>
                            <input type="text" name="first_name" id="first_name" value="{{Request::old('first_name')?:Auth::user()->first_name}}" class="form-control">
                            @if($errors->has('first_name'))
                                <p class="text-danger">{{$errors->first('first_name')}}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group{{$errors->has('first_name')?' has-error':''}}">
                            <label for="last_name" class="control-label">Last name</label>
                            <input type="text" name="last_name" id="last_name" value="{{Request::old('last_name')?:Auth::user()->last_name}}" class="form-control">
                            @if($errors->has('last_name'))
                                <p class="text-danger">{{$errors->first('last_name')}}</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group{{$errors->has('first_name')?' has-error':''}}">
                    <label for="location" class="control-label">Location</label>
                    <input type="text" name="location" id="location" value="{{Request::old('location')?:Auth::user()->location}}" class="form-control">
                    @if($errors->has('location'))
                        <p class="text-danger">{{$errors->first('location')}}</p>
                    @endif
                </div>
                <input type="hidden" name="_token" value="{{Session::token()}}">
                <div class="form-group">
                    <button class="btn btn-default">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop