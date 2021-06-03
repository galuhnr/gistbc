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
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template')}}/dist/css/adminlte.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets')}}/css/style.css">

  <style>
    .hero-image{
      background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url("{{asset('assets')}}/img/sby.jpg");
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      position: relative;
    }
  </style>
</head>
<body class="hero-image" >
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
          <h2 class="heading-section">Selamat Datang Website Pemetaan Penyakit TBC Kota Surabaya</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
          <div class="login-wrap p-0">
            <form method="POST" action="{{ route('login') }}" >
              @csrf
              <div class="form-group">
                <input id="email" type="email" class="form-login @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Masukkan email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <input id="password" type="password" class="form-login @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Masukkan password">
                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group mt-4">
                <button type="submit" class="btn btn-block" style="background-color: #243C60; color: white; border-radius: 40px;">Masuk</button>
              </div>
              <div class="form-group d-md-flex">
                <div class="w-50 text-md-right">
                  <p>Belum punya akun?&nbsp&nbsp<span><a href="{{ route('register') }}" class="link-daftar">Daftar</a></span></p>
								</div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

<!-- jQuery -->
<script src="{{asset('template')}}/plugins/jquery/jquery.min.js"></script>
<!-- Popper -->
<script src="{{asset('assets')}}/js/popper.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template')}}/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- Main -->
<script src="{{asset('assets')}}/js/main.js"></script>


</body>
</html>
