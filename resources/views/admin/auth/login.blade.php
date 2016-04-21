@extends('admin.layouts.auth')
@section("title", "Admin Login")

@section('content')
<div class="graphs">
    <div class="sign-in-form">
        <div class="sign-in-form-top">
            <p><span>Sign In to</span> <a href="index.html">Admin</a></p>
        </div>
        <div class="signin">

            <form method="POST">
                {!! csrf_field() !!}
                <div class="log-input">
                    <div class="log-input-left">
                        <input name="email" type="text" class="user" placeholder="email" onfocus="this.value = '';" onblur="if (this.value == '') {
                                    this.value = 'Email address:';
                                }"/>
                    </div>
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif

                    <div class="clearfix"> </div>
                </div>
                <div class="log-input">
                    <div class="log-input-left">
                        <input name="password" placeholder="password" type="password" class="lock" onfocus="this.value = '';" onblur="if (this.value == '') {
                                    this.value = 'Email address:';
                                }"/>
                    </div>
                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif

                    <div class="clearfix"> </div>
                </div>
                <input type="submit" value="Login to your account">
            </form>
            <div class="signin-rit">
                <span class="checkbox1">
                    <a href="{!! action('auth\PasswordController@getReset') !!}">Forgot Password ?</a>
                </span>               
                <div class="clearfix"> </div>
            </div>
        </div>

    </div>
</div>
@endsection
