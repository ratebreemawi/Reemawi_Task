@extends('layouts.auth')

@section('content')

    <style>
        button{
            width: 20%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 30px;

        }

        #grad {
            height: 750px;
            background-image: url("/islamic.png");
            width: 1000px;
            background-size: cover;
            border: 6px solid #333;
            margin:0px 450px;
        }
        h1{
            color: red;

           margin-left: 800px;
            margin-top: 100px;
        }
        input {
            width: 25%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            margin-left: 20px;

        }
        label{
            margin-left: 20px;
        }

    </style>
    <h1 class="h1">Oh Register Now !</h1>
    <div id="grad">
    <div class="container"  >
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                                <div class="col-md-6" >
                                    <label>Name</label>
                                    <input id="name" type="text" class="form-control" name="name" placeholder="Enter your Name Please"   required autofocus style="margin-left: 105px">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">


                                <div class="col-md-6">
                                    <label >Email_Address</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter Your Email Please"  required style="margin-left: 42px">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">


                                <div class="col-md-6">
                                    <label>Password</label>
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Enter Your Password Please"  required style="margin-left: 80px" >

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">


                                <div class="col-md-6">
                                    <label>Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Enter Password again to confirm it"  required>

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group" >
                                <div class="col-md-6 col-md-offset-4"  >
                                    <button type="submit" class="btn btn-primary" >
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
