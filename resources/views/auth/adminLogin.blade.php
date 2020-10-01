<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Student Counseling Portal">
    <meta name="author" content="Utsav Katuwal,Khon Phu">
    <meta name="keywords" content="Online Appointment booking Portal">
    <title>Admin Login - Student Counseling Portal</title>
    {{-- Styling Used --}}
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="css/theme.css" rel="stylesheet" media="all">
</head>
<body>
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="images/logo.png" alt="Student Counseling Logo">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="/adminLogin" method="post">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email"
                                        placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password"
                                        placeholder="Password">
                                </div>
                                {{-- <a href="{{ url('auth/google') }}" class="btn btn-lg btn-primary btn-block">
                                    <strong>Login With Google</strong>
                                    </a>  --}}
                                <button class="btn btn-lg btn-primary btn-block" type="submit">
                                    Login</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Scripting Used --}}
    <script src="vendor/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="vendor/bootstrap-4.1/popper.min.js" type="text/javascript"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js" type="text/javascript"></script>
    <script src="vendor/slick/slick.min.js" type="text/javascript"></script>
    <script src="vendor/wow/wow.min.js" type="text/javascript"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js" type="text/javascript"></script>
    <script src="vendor/counter-up/jquery.waypoints.min.js" type="text/javascript"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js" type="text/javascript"></script>
    <script src="vendor/circle-progress/circle-progress.min.js" type="text/javascript"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js" type="text/javascript"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js" type="text/javascript"></script>
    <script src="vendor/select2/select2.min.js" type="text/javascript"></script>
    <script src="js/main.js" type="text/javascript"></script>

</body>

</html>
