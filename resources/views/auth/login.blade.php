<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
    <title>Rubaiyat Kamal Transport - Login</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel='shortcut icon' href='/image/rkt.png' type='image/png'/ >

    <!-- Google Font: Open Sans -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,800,800italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald:400,300,700">

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="../assets/css/animate.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body class="gray-bg">
    <div class="loginColumns animated fadeInDown">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8" align="center">
                <h2 class="font-bold">Welcome to Rubaiyat Kamal Transport</h2>
                <p>Employee Login</p>
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="ibox-content" style="box-shadow: 0 1px 2px #888">
                        <form class="m-t" role="form" method="POST" action="/auth/login">
                        {!! csrf_field() !!}

                        @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-warning">
                                    <a class="close" data-dismiss="alert" href="#" aria-hidden="true">×</a>
                                    <p style="text-align: center; color: black">{{ $error }}</p>
                                </div>
                            @endforeach
                        @endif
                            <div class="form-group">
                                <input autofocus type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Type your Email" required="">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Type your Password" required="">
                            </div>
                            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
                            <!-- <a href="#">
                                <small>Forgot password?</small>
                            </a> -->
                            <p class="text-muted text-center">
                                <small>Do not have an account?</small>
                            </p>
                            <a class="btn btn-sm btn-success btn-block" href="/auth/register">Create an account</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <hr/>
        
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-4">
                Rubaiyat Kamal Transport
            </div>
            <div class="col-md-4 text-right">
               <small>&copy; 2016 - 2017</small>
            </div>
        </div>
    </div>
</body>

</html>