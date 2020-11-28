<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>GIOSS | Admin Login</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{ asset('logo.png') }}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{ asset('adminAsset/assets/js/plugin/webfont/webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['{{ asset('adminAsset/assets/css/fonts.css') }}']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('adminAsset/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('adminAsset/assets/css/azzara.min.css') }}">
</head>
<body class="login">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
		@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong><i class="fa fa-check text-white">&nbsp;</i>{{ $message }}</strong>
</div>
@endif
@if ($message = Session::get('danger'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
            <div class="text-center">
                <img src="{{ asset('logo.png') }}" style="width:40%">
            </div>
			<h3 class="text-center">Sign In</h3>
			<div class="login-form">
            <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
				<div class="form-group form-floating-label">
					<input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror input-border-bottom" value="{{ old('email') }}" >
					<label for="email" class="placeholder">Email</label>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
				</div>
				<div class="form-group form-floating-label">
					<input id="password" name="password" type="password" class="form-control  @error('password') is-invalid @enderror input-border-bottom" >
					<label for="password" class="placeholder">Password</label>
					<div class="show-password">
						<i class="flaticon-interface"></i>
					</div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
				</div>
				<div class="form-action mb-3">
					<button type="submit" class="btn btn-primary btn-rounded btn-login">Sign In</button>
				</div>
                </form>
				
			</div>
		</div>

	</div>
	<script src="{{ asset('adminAsset/assets/js/core/jquery.3.2.1.min.js') }}"></script>
	<script src="{{ asset('adminAsset/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('adminAsset/assets/js/core/popper.min.js') }}"></script>
	<script src="{{ asset('adminAsset/assets/js/core/bootstrap.min.js') }}"></script>
	<script src="{{ asset('adminAsset/assets/js/ready.js') }}"></script>
</body>
</html>
