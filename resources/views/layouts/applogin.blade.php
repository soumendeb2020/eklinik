

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/form-elements.css">
        <!-- <link rel="stylesheet" href="css/login_style.css"> -->
        <link rel="stylesheet" href="css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
    </head>
    <body>
        <!-- Top content -->
        <div class="top-content">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Welcome To eKlinik</strong></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Login to eKlinik</h3>
                                    <p>Enter your username and password to log on:</p>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <!--
                                <form role="form" action="{{ route('login') }}" method="post" class="login-form">
                                    @csrf
                                    <div class="form-group">
                                        <label class="sr-only" for="form-username">Username</label>
                                        <input type="text" name="email" placeholder="Username..." class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email">
                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password">Password</label>
                                        <input type="password" name="password" placeholder="Password..." class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password">

                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn">Sign in!</button>
                                </form>
                                -->
                                <form role="form" action="{{ route('login') }}" method="post" class="login-form">
                                    @csrf
                                    <div class="form-group">
                                        <input id="username" type="text" placeholder="Username..." class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
                                        @if ($errors->has('username'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password">Password</label>
                                        <input type="password" name="password" placeholder="Password..." class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password">
                                        @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                    <button type="submit" class="btn">Sign in!</button>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="description">
                        <p>
                            All Copyright Reserved @2019  ~  Owned by Majlis Perbandaran Petaling Jaya
                        </p>
                    </div>
                    <div class="col-sm-6 col-sm-offset-3 form-box">
                        <div class="form-bottom">
                            <table  class="table-striped table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th data-hide="phone">Username</th>
                                        <th data-hide="phone">Email</th>
                                        <th data-class="expand">Password</th>
                                        <th data-class="expand"></i>Job Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>111111111111</td>
                                        <td>admin@mbpj.com</td>
                                        <td>secret</td>
                                        <td>admin</td>
                                    </tr>
                                    <tr>
                                        <td>888888888888</td>
                                        <td>reception@mbpj.com</td>
                                        <td>secret</td>
                                        <td>staff</td>
                                    </tr>    
                                    <tr>
                                        <td>222222222222</td>
                                        <td>doctor@mbpj.com</td>
                                        <td>secret</td>
                                        <td>doctor</td>
                                    </tr>    
                                    <tr>
                                        <td>666666666666</td>
                                        <td>lab@mbpj.com</td>
                                        <td>secret</td>
                                        <td>laboratory</td>
                                    </tr>    
                                    <tr>
                                        <td>333333333333</td>
                                        <td>dispensary@mbpj.com</td>
                                        <td>secret</td>
                                        <td>dispensary</td>
                                    </tr>    
                                    <tr>
                                        <td>444444444444</td>
                                        <td>inventory@mbpj.com</td>
                                        <td>secret</td>
                                        <td>inventory</td>
                                    </tr>  
                                    <tr>
                                        <td>555555555555</td>
                                        <td>ty2@mbpj.com</td>
                                        <td>secret</td>
                                        <td>TY2</td>
                                    </tr> 
                                </tbody>
                            </table>
                        </div>
                        <!--  @yield('content') -->
                    </div>
                    <!-- footer-->
                </div>
            </div>
        </div>
        <!-- Javascript -->
        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.backstretch.min.js"></script>
        <script src="js/scripts.js"></script>
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
    </body>

</html>