<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JYM Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
        .form-control {
            padding: 0.65rem 0.75rem;
        }

        .btn-info {
            padding: 0.65rem 0.75rem;
            font-size: 17px;
            letter-spacing: 0.9px;
            text-transform: uppercase;
            margin-top: 30px;
            color: #fff;
            background-color: #435ebe;
            border-color: #435ebe;
        }

        .btn-info:hover {

         background-color: #435ebe;
         border-color: #435ebe;
     }
        .btn-info:active {

            background-color: #435ebe;
            border-color: #435ebe;
        }
        .btn-info:focus{

         background-color: #435ebe;
         border-color: #435ebe;
     }
        .text-info {
    color: #435ebe !important;
}
    </style>
</head>

<body>
    <div id="login">
        <br><br><br>`
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-5" style="border: 1px solid #5170dc91; border-radius: 20px; padding: 30px;min-height: 500px; padding-top: 30px;">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="{{ route('authenticate') }}" method="POST">
                            @csrf
                            <h3 class="text-center text-info" style="    padding-bottom: 50px;">JYM LOGIN</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Email / phone no</label><br>
                                <input type="text" name="email_phone" id="email_phone" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <!-- <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br> -->
                                <button style="width:100%" type="submit" name="submit" class="btn btn-info btn-md" value="Login">Login</button>
                            </div>
                            <div id="register-link" class="text-right">
                                <!-- <a href="#" class="text-info">Register here</a> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
