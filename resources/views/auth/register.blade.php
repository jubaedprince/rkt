<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Google Font: Open Sans -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,800,800italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald:400,300,700">

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="../assets/css/animate.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body class="gray-bg">
    <div class="loginColumns animated fadeInDown">
        <div class="col-md-3"></div>
        <div class="col-md-6" align="center" style="margin-top: -44px">
            <h2 class="font-bold">Rubaiyat Kamal Transport</h2>
            <p>Apply for Account</p>
            <div class="ibox-content" style="box-shadow: 0 1px 2px #888">
                <form class="m-t" role="form" method="POST" action="/auth/register">
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
                        <input autofocus type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Type Your Name" tabindex="2">
                    </div> <!-- /.form-group -->

                    <div class="form-group">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Type Your Email" tabindex="2">
                    </div> <!-- /.form-group -->

                    <div class="form-group">
                        <input type="text" class="form-control" name="company_name" value="{{ old('company_name') }}" placeholder="Type your Company Name" tabindex="3">
                    </div> <!-- /.form-group -->

                    <div class="form-group">
                        <input type="text" class="form-control" name="position" value="{{ old('position') }}" placeholder="Type your Position" tabindex="3">
                    </div> <!-- /.form-group -->

                    <div class="form-group">
                        <select class="form-control m-b" name="type">
                            <option>Specify your type</option>
                            <option value="user">User</option>
                            <option value="viewer">Viewer</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Type Password" tabindex="4">
                    </div> <!-- /.form-group -->

                    <div class="form-group">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Again Type Password" tabindex="4">
                    </div>
                    
                    <button type="submit" class="btn btn-primary block full-width m-b">Register</button>

                    <p class="text-muted text-center"><small>Already have an account?</small></p>
                    <a class="btn btn-sm btn-success btn-block btn-edit" href="/auth/login">Login</a>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>

</body>
</html>