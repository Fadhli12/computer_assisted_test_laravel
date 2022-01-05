<!DOCTYPE html>
<html>
<head>
    <title>Superior Sulbar - Login</title>
    <meta charset="utf-8" />
    <meta content="ie=edge" http-equiv="x-ua-compatible" />
    <meta content="template language" name="keywords" />
    <meta content="Tamerlan Soziev" name="author" />
    <meta content="Admin dashboard html template" name="description" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link href="favicon.png" rel="shortcut icon" />
    <link href="apple-touch-icon.png" rel="apple-touch-icon" />
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets')}}/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{asset('assets')}}/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
    <link href="{{asset('assets')}}/bower_components/dropzone/dist/dropzone.css" rel="stylesheet" />
    <link href="{{asset('assets')}}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet" />
    <link href="{{asset('assets')}}/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
    <link href="{{asset('assets')}}/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet" />
    <link href="{{asset('assets')}}/bower_components/slick-carousel/slick/slick.css" rel="stylesheet" />
    <link href="{{asset('assets')}}/css/main.css?version=4.4.0" rel="stylesheet" />
</head>
<body class="auth-wrapper">
<div class="all-wrapper menu-side with-pattern">
    <div class="auth-box-w">
        <div class="logo-w">
            <a href="index.html"><img alt="" src="{{asset('assets')}}/img/logo-big.png" /></a>
        </div>
        <h4 class="auth-header">
            Login Form
        </h4>
        <form action="{{route('login')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Username</label>
                <input name="email" class="form-control" placeholder="Enter your username" type="text" />
                <div class="pre-icon os-icon os-icon-user-male-circle"></div>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input name="password" class="form-control" placeholder="Enter your password" type="password" />
                <div class="pre-icon os-icon os-icon-fingerprint"></div>
            </div>
            <div class="buttons-w">
                @if (session()->has('message'))
                <p class="text-danger" >{{session('message')}}</p>
                @endif
                <button class="btn btn-primary">Log me in</button>
                <div class="form-check-inline">
                    <label class="form-check-label"><input name="remeber_me" class="form-check-input" type="checkbox" />Remember Me</label>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
