<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Forgot Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css"/>
</head>
<body class="authentication-bg">
<div class="home-btn d-none d-sm-block">
    <a href="/"><i class="fas fa-home h2 text-dark"></i></a>
</div>
<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="text-center">
                    <a href="javascript:void(0);">
                        <span>
                            <img src="{{asset('assets/images/logo_native_brains.png')}}" alt="" height="">
                        </span>
                    </a>
                    <p></p>
                </div>
                <div class="card">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <h4 class="text-uppercase mt-0">Forgot Password</h4>
                        </div>
                        @if(Session::has('error_message'))
                            <div class="alert alert-danger">
                                {{ Session::get('error_message') }}
                            </div>
                        @endif
                        <form action="{{ route('admin.forgot') }}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="emailaddress">Email address</label>
                                <input class="form-control" type="email" id="email" name="email"
                                       value="{{old('email')}}" placeholder="Enter your email">
                                <div class="danger alert-danger my-2">
                                    @if(isset($errors)) {{ $errors->first('email') }}  @endif
                                </div>
                            </div>
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" type="submit">Send email</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
