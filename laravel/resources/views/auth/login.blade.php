<!doctype html>
<html lang="en" dir="ltr">
<head>
    @include('admin.layouts.head', ['title' => 'Login'])
</head>

<body class="app flex-row align-items-center">
<div class="app-body">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card-group">
                    <div class="card p-4">
                        {!! Form::open(['route' => 'login', 'method' => 'post']) !!}
                        <div class="card-body">
                            <h1>Login</h1>
                            <p class="text-muted">Sign In to your account</p>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-user"></i>
                                        </span>
                                </div>
                                {!! Form::email('email', null, ['class' => 'form-control '.($errors->has('email') ? 'is-invalid' : null ), 'placeholder' => 'Email address']) !!}
                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-lock"></i>
                                </span>
                                </div>
                                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    {!! Form::submit('Login', ['class' => 'btn btn-primary px-4']) !!}
                                </div>
                                <div class="col-6 text-right">
                                    <a href="#" class="btn btn-link px-0">Forgot password?</a>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ mix('js/admin.js') }}"></script>
</body>
</html>