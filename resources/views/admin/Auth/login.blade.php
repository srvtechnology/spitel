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
        <br><br><br>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-5" style="border: 1px solid #5170dc91; border-radius: 20px; padding: 30px;min-height: 500px; padding-top: 30px;">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="{{ route('authenticate') }}" method="POST" onsubmit="return validateForm()">
                            @csrf
                            <h3 class="text-center text-info" style="    padding-bottom: 50px;">JYM LOGIN</h3>
                            <div class="alert alert-danger" role="alert" id="error_section" style="display: none;"></div>
                            <div class="form-group">
                                <label for="username" class="text-info">Phone no</label><br>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">+91</span>
                                    </div>
                                    <input type="text" name="email_phone" id="email_phone" class="form-control" required>
                                    <input type="hidden" name="final_email_phone" id="final_email_phone">
                                </div>
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
{{--  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function validateForm() {
        var inputValue = $("#email_phone").val();

        const phonePattern = /^\d{10}$/g;
        if (phonePattern.test(inputValue) == false) {
            $("#error_section").css("display", "block").text("Please enter a valid 10-digit phone number");
            return false;
        }

        var finalEmailPhone = "+91" + inputValue;
        $("#final_email_phone").val(finalEmailPhone);
        return true;
    }
</script>

