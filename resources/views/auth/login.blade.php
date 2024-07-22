<!DOCTYPE html>
<html lang="en">
<head>
	<base href="../../../" />
	<title>Login Sinta</title>
	<meta charset="utf-8" />
	<meta name="description" content="Login page example" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="Login Sinta" />
	<meta property="og:url" content="https://keenthemes.com/metronic" />
	<meta property="og:site_name" content="Metronic by Keenthemes" />
	<link rel="canonical" href="http://authentication/layouts/corporate/sign-in.html" />
	<link rel="shortcut icon" href="{{asset('logos.png')}}" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
	<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<script>
		if (window.top != window.self) {
			window.top.location.replace(window.self.location.href);
		}
	</script>
</head>
<body id="kt_body" class="app-blank">
	<script>
		var defaultThemeMode = "light";
		var themeMode;
		if (document.documentElement) {
			if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
				themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
			} else {
				if (localStorage.getItem("data-bs-theme") !== null) {
					themeMode = localStorage.getItem("data-bs-theme");
				} else {
					themeMode = defaultThemeMode;
				}
			}
			if (themeMode === "system") {
				themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
			}
			document.documentElement.setAttribute("data-bs-theme", themeMode);
		}
	</script>
	<div class="d-flex flex-column flex-root" id="kt_app_root">
		<div class="d-flex flex-column flex-lg-row flex-column-fluid">
			<div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
				<div class="d-flex flex-center flex-column flex-lg-row-fluid">
					<div class="w-lg-500px p-10">
						<form class="form w-100" method="POST" action="{{ route('login') }}">
							@csrf
							<div class="text-center mb-11">
								<h1 class="text-gray-900 fw-bolder mb-3">Login Sinta</h1>
								<div class="text-gray-500 fw-semibold fs-6">Masuk untuk mengelola proyek Anda</div>
							</div>
							<div class="row g-3 mb-9">
								<div class="col-md-6">
									<a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
									<img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg" class="h-15px me-3" />Masuk dengan Google</a>
								</div>
								<div class="col-md-6">
									<a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
									<img alt="Logo" src="assets/media/svg/brand-logos/facebook-4.svg" class="h-15px me-3" />Masuk dengan Facebook</a>
								</div>
							</div>
							<div class="separator separator-content my-14">
								<span class="w-125px text-gray-500 fw-semibold fs-7">Atau dengan Username</span>
							</div>
							<div class="fv-row mb-8">
								<input type="text" placeholder="Username" name="username" autocomplete="off" class="form-control bg-transparent" required />
								@error('username')
									<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="fv-row mb-3">
								<input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent" required />
								@error('password')
									<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
								<div></div>
								<a href="{{ route('password.request') }}" class="link-primary">Lupa password?</a>
							</div>
							<div class="d-grid mb-10">
								<button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
									<span class="indicator-label">Lanjutkan</span>
									<span class="indicator-progress">Tunggu sebentar...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
							</div>
							<div class="text-gray-500 text-center fw-semibold fs-6">Belum punya akun? 
							<a href="https://wa.me/6283829265400" class="link-primary">Hubungi Aldy</a></div>
						</form>
					</div>
				</div>
			</div>
			<div class="d-flex fw-semibold text-primary fs-base gap-5 justify-content-end" style="background-image: url('{{ asset('gambarperusahananimasi.jpg') }}'); background-size: cover; background-position: center;">
				<div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
					<a href="../../demo1/index.html" class="mb-0 mb-lg-12">
						<img alt="Logo" src="{{asset('logos.png')}}" class="h-60px h-lg-75px" />
					</a>
					<img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-10 mb-lg-20" src="{{ asset('orangkantoranimasi-removebg-preview.png') }}" alt="" />
				</div>
			</div>
		</div>
	</div>
	<script src="assets/plugins/global/plugins.bundle.js"></script>
	<script src="assets/js/scripts.bundle.js"></script>
	<script src="assets/js/custom/authentication/sign-in/general.js"></script>
</body>
</html>
