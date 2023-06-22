<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href='https://fonts.googleapis.com/css?family=Barrio' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="outer">
        <div class="middle">
            <div class="inner">
                <div class="logobox">
                        H-QMS
                </div>
                <div class="form">
                    <form class="login-form" action="{{ route('login') }}" method="POST">
                        {{ csrf_field() }}
                        <div>
                            <input type="email" class="form-username" name="email" placeholder="Email" value="{{ old('email') }}" autofocus autocomplete="off"/>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                      <div>
                        <input type="password" class="form-password" name="password" placeholder="password" autocomplete="off" />
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                      </div>
                        <button>login</button>
                        <a href="/register">Register</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
