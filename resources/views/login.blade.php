<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Selamat Datang Website Pemetaan TBC Kota Surabaya</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template')}}/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style>
    .login-title{
      text-align: center;
      margin: 0;
      font-weight: 600;
      font-size: 1.1rem;
      color: #152946;
    }
    .hero-image{
      background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("{{asset('assets')}}/img/bg.jpg");
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      position: relative;
    }
    .link-daftar{
      color: #243C60;
      text-decoration: underline;
    }
  </style>
</head>
<body class="hold-transition login-page hero-image">
  <div class="login-box">
      <div class="card card-light">
        <div class="card-header">
          <h3 class="login-title">LOGIN ADMIN</h3>
        </div>
        <form action="">
          <div class="card-body login-card-body">
            <div class="input-group mb-4 mt-2">
              <input type="email" class="form-control" placeholder="Email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-4">
              <input type="password" class="form-control" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 mb-0">
                <button type="submit" class="btn btn-block" style="background-color: #243C60; color: white;">Login</button>
                <p class="mt-2" style="font-size:12px;">Belum punya akun?&nbsp&nbsp<span><a href="" class="link-daftar">Daftar</a></span></p>
              </div>
            </div>
          </div>
        </form>
      </div>
  </div>

<!-- jQuery -->
<script src="{{asset('template')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('template')}}/dist/js/adminlte.min.js"></script>

</body>
</html>
