<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8" />
    <meta name="description"
        content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords"
        content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Metronic - The World's #1 Selling Bootstrap Admin Template by KeenThemes" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Metronic by Keenthemes" />
    @include('layout.link')
	@yield('style')
</head>

<body id="kt_app_body" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true"
    data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true"
    data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="false" data-kt-app-toolbar-enabled="true"
    data-kt-app-aside-enabled="false" data-kt-app-aside-fixed="false" data-kt-app-aside-push-header="false"
    data-kt-app-aside-push-toolbar="false" data-kt-app-aside-push-footer="false" class="app-default">
    <style>
	    .menu-item form {
			border: none; 
			padding: 0;
			margin: 0; 
		}
		.menu-link {
			background-color: transparent; 
			border: none; 
			padding: 0; 
			margin: 0; 
			cursor: pointer; 
		}
        .rotate-icon {
            display: inline-block;
            animation: rotate 2s linear infinite;
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }
    </style>
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            @include('layout.header')
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                @include('layout.sidebar')
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <div class="d-flex flex-column flex-column-fluid">
                        <div id="kt_app_toolbar" class="app-toolbar" data-kt-sticky="true"
                            data-kt-sticky-name="app-toolbar-sticky"
                            data-kt-sticky-offset="{default: 'false', lg: '300px'}">
                            <div id="kt_app_toolbar_container"
                                class="app-container container-fluid d-flex align-items-stretch">
                                <div class="app-toolbar-wrapper d-flex flex-stack w-100">
									<div class="page-title d-flex flex-column justify-content-center me-3 mb-0">
										<h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center me-3 my-0">
											@yield('page-title', 'Dashboard')
										</h1>
										<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
											<li class="breadcrumb-item text-muted">
												<a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">@lang('Home')</a>
											</li>
											<li class="breadcrumb-item">
												<span class="bullet bg-gray-500 w-5px h-2px"></span>
											</li>
											<li class="breadcrumb-item text-muted">@yield('breadcrumb', 'Page')</li>
										</ul>
									</div>									
                                    <div class="app-navbar flex-stack flex-shrink-0 p-5 pt-lg-12 pb-lg-8 px-lg-14"
                                        id="kt_app_aside_navbar">
                                        <div class="d-flex align-items-center me-5 me-lg-10">
                                            <div class="app-navbar-item h-fit me-4" id="kt_header_user_menu_toggle">
                                                <div class="cursor-pointer symbol symbol-40px"
                                                    data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                                    data-kt-menu-attach="parent" data-kt-menu-placement="bottom-start">
													@if(Auth::guard('karyawan')->check() && Auth::guard('karyawan')->user()->foto)
														<img src="{{ asset('fotos/' . Auth::guard('karyawan')->user()->foto) }}" alt="Foto" class="w-100" />
													@else
														<img src="assets/media/avatars/300-2.jpg" alt="User Avatar" class="w-100" />
													@endif
                                                </div>
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                                                    data-kt-menu="true">
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content d-flex align-items-center px-3">
                                                            <div class="symbol symbol-50px me-5">
                                                                @if(Auth::guard('karyawan')->check() && Auth::guard('karyawan')->user()->foto)
																	<img src="{{ asset('fotos/' . Auth::guard('karyawan')->user()->foto) }}" alt="Foto" class="w-100" />
																@else
																	<img src="assets/media/avatars/300-2.jpg" alt="User Avatar" class="w-100" />
																@endif
                                                            </div>
                                                            <div class="d-flex flex-column">
                                                                <div class="fw-bold d-flex align-items-center fs-5">
																@auth('karyawan')
																	<span class="fw-bold d-flex align-items-center fs-5">{{ Auth::guard('karyawan')->user()->nama }}</span>
																@endauth
																<span
																class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span>
                                                                </div>
																@auth('karyawan')
																<a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ Auth::guard('karyawan')->user()->username }}</a>
																@endauth															
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="separator my-2"></div>
                                                    <div class="menu-item px-5">
                                                        <a href="account/overview.html" class="menu-link px-5">My profile
                                                        </a>
                                                    </div>
                                                    <div class="menu-item px-5">
                                                        <a href="{{route('projects.index')}}" class="menu-link px-5">
                                                            <span class="menu-text">My Projects</span>
                                                            <span class="menu-badge">
                                                            <span
                                                                class="badge badge-light-danger badge-circle fw-bold fs-7">3</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="separator my-2"></div>
                                                    <div class="menu-item px-5"
                                                        data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                                        data-kt-menu-placement="left-start"
                                                        data-kt-menu-offset="-15px, 0">
                                                        <a href="#" class="menu-link px-5">
                                                            <span class="menu-title position-relative">Mode
                                                                <span
                                                                    class="ms-5 position-absolute translate-middle-y top-50 end-0">
                                                                    <i
                                                                        class="ki-outline ki-night-day theme-light-show fs-2"></i>
                                                                    <i
                                                                        class="ki-outline ki-moon theme-dark-show fs-2"></i>
                                                                </span>
                                                            </span>
                                                        </a>
                                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px"
                                                            data-kt-menu="true" data-kt-element="theme-mode-menu">
                                                            <div class="menu-item px-3 my-0">
                                                                <a href="#" class="menu-link px-3 py-2"
                                                                    data-kt-element="mode" data-kt-value="light">
                                                                    <span class="menu-icon" data-kt-element="icon">
                                                                        <i class="ki-outline ki-night-day fs-2"></i>
                                                                    </span>
                                                                    <span class="menu-title">Light</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item px-3 my-0">
                                                                <a href="#" class="menu-link px-3 py-2"
                                                                    data-kt-element="mode" data-kt-value="dark">
                                                                    <span class="menu-icon" data-kt-element="icon">
                                                                        <i class="ki-outline ki-moon fs-2"></i>
                                                                    </span>
                                                                    <span class="menu-title">Dark</span>
                                                                </a>
                                                            </div>
                                                            <div class="menu-item px-3 my-0">
                                                                <a href="#" class="menu-link px-3 py-2"
                                                                    data-kt-element="mode" data-kt-value="system">
                                                                    <span class="menu-icon" data-kt-element="icon">
                                                                        <i class="ki-outline ki-screen fs-2"></i>
                                                                    </span>
                                                                    <span class="menu-title">System</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="menu-item px-5 my-1">
                                                        <a href="account/settings.html" class="menu-link px-5">Account
                                                            Settings</a>
                                                    </div>
													<div class="menu-item px-5">
														<form action="{{ route('logout') }}" method="POST">
															@csrf
															<button type="submit" class="menu-link px-5">Sign Out</button>
														</form>
													</div>													
                                                </div>
                                            </div>
											<div class="d-flex flex-column">
												@if(auth()->guard('karyawan')->check())
													<a href="pages/user-profile/overview.html" class="app-navbar-user-name text-gray-900 text-hover-primary fs-5 fw-bold">
														{{ auth()->guard('karyawan')->user()->nama }}
													</a>
													<span class="app-navbar-user-info text-gray-600 fw-semibold fs-7">
														{{ auth()->guard('karyawan')->user()->role }}
													</span>
												@endif
											</div>
                                        </div>
										<div class="app-navbar-item">
											<div class="btn btn-icon btn-custom btn-dark w-40px h-40px app-navbar-user-btn"
												data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
												data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
												<i class="ki-outline ki-notification-on fs-1"></i>
											</div>
											<div class="menu menu-sub menu-sub-dropdown menu-column w-250px w-lg-325px"
												data-kt-menu="true">
												<div class="d-flex flex-column flex-center bgi-no-repeat rounded-top px-9 py-10"
													style="background-image:url('assets/media/misc/menu-header-bg.jpg')">
													<h3 class="text-white fw-semibold mb-3">Quick Links</h3>
													<span class="badge bg-primary text-inverse-primary py-2 px-3">25 pending
														tasks</span>
												</div>
												<div class="row g-0">
													<div class="col-6">
														<a href="apps/projects/budget.html"
															class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end border-bottom">
															<i class="ki-outline ki-dollar fs-3x text-primary mb-2"></i>
															<span class="fs-5 fw-semibold text-gray-800 mb-0">Accounting</span>
															<span class="fs-7 text-gray-500">eCommerce</span>
														</a>
													</div>
													<div class="col-6">
														<a href="apps/projects/settings.html"
															class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-bottom">
															<i class="ki-outline ki-sms fs-3x text-primary mb-2"></i>
															<span
																class="fs-5 fw-semibold text-gray-800 mb-0">Administration</span>
															<span class="fs-7 text-gray-500">Console</span>
														</a>
													</div>
													<div class="col-6">
														<a href="apps/projects/list.html"
															class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end">
															<i class="ki-outline ki-abstract-41 fs-3x text-primary mb-2"></i>
															<span class="fs-5 fw-semibold text-gray-800 mb-0">Projects</span>
															<span class="fs-7 text-gray-500">Pending Tasks</span>
														</a>
													</div>
													<div class="col-6">
														<a href="apps/projects/users.html"
															class="d-flex flex-column flex-center h-100 p-6 bg-hover-light">
															<i class="ki-outline ki-briefcase fs-3x text-primary mb-2"></i>
															<span class="fs-5 fw-semibold text-gray-800 mb-0">Customers</span>
															<span class="fs-7 text-gray-500">Latest cases</span>
														</a>
													</div>
												</div>
												<div class="py-2 text-center border-top">
													<a href="pages/user-profile/activity.html"
														class="btn btn-color-gray-600 btn-active-color-primary">View All
														<i class="ki-outline ki-arrow-right fs-5"></i></a>
												</div>
											</div>
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="kt_app_content" class="app-content flex-column-fluid">
                    <div id="kt_app_content_container" class="app-container container-fluid">
                        @yield('content')
                    </div>
                </div>
                @include('layout.footer')
            </div>
        </div>
    </div>
    </div>
    </div>
    @include('layout.script')
	@yield('script')
</body>
</html>
