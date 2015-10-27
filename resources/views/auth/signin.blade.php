@extends('templates.default')

@section('content')
    <h3>Sign in</h3>
    <div class="row">
    <div class="col-lg-6">
        <form class="form-horizontal" action="{{ route('auth.signin') }}" method="post">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3"name="email"  placeholder="Email" value="{{ Request::old('email') ? : '' }}">
                    @if($errors->has('email'))
                    <p class="text-danger">{{$errors->first('email')}}</p>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : ''}}">
                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password" value="{{ Request::old('password') ? : '' }}">
                    @if($errors->has('password'))
                    <p class="text-danger">{{$errors->first('password')}}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Remember me
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Sign up</button>
                </div>
            </div>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
    </div>
</div>
@stop