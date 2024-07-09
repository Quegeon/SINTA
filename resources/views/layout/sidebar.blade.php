{{-- @if(auth()->user()->role === 'admin') --}}
<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="100px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
	<div class="app-sidebar-logo d-none d-lg-flex flex-center pt-10 mb-3" id="kt_app_sidebar_logo">
		<a href="index.html">
			<img alt="Logo" src="{{asset('logos.png')}}" class="h-50px" />
		</a>
	</div>
	<div class="app-sidebar-menu d-flex flex-center overflow-hidden flex-column-fluid">
		<div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper d-flex hover-scroll-overlay-y scroll-ps mx-2 my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu, #kt_app_sidebar" data-kt-scroll-offset="5px">
			<div class="menu menu-column menu-rounded menu-active-bg menu-title-gray-700 menu-arrow-gray-500 menu-icon-gray-500 menu-bullet-gray-500 menu-state-primary my-auto" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
				<div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item here show py-2">
					<span class="menu-link menu-center">
						<span class="menu-icon me-0">
							<i class="ki-outline ki-home-2 fs-2x"></i>
						</span>
					</span>
					<div class="menu-sub menu-sub-dropdown px-2 py-4 w-250px mh-75 overflow-auto">
						<div class="menu-item">
							<div class="menu-content">
								<span class="menu-section fs-5 fw-bolder ps-1 py-1">Home</span>
							</div>
						</div>
						<div class="menu-item">
							<a href="{{ route('Dashboard') }}" class="menu-link">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Dashboard</span>
							</a>
						</div>
					</div>
				</div>
				<div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item py-2">
					<span class="menu-link menu-center">
						<span class="menu-icon me-0">
							<i class="ki-outline ki-user-tick fs-2x"></i>
						</span>
					</span>
					<div class="menu-sub menu-sub-dropdown menu-sub-indention px-2 py-4 w-250px mh-75 overflow-auto">
						<div class="menu-item">
							<div class="menu-content">
								<span class="menu-section fs-5 fw-bolder ps-1 py-1">Manajemen Pengguna</span>
							</div>
						</div>
						<div class="menu-item menu-accordion">
							<a href="{{ route('karyawans.index') }}" class="menu-link">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Data Pengguna</span>
							</a>
							<span class="menu-link">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Atvitas Pengguna</span>
							</span>
						</div>
					</div>
				</div>
				<div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item py-2">
					<span class="menu-link menu-center">
						<span class="menu-icon me-0">
							<i class="ki-outline ki-office-bag fs-2x"></i>
						</span>
					</span>
					<div class="menu-sub menu-sub-dropdown menu-sub-indention px-2 py-4 w-250px mh-75 overflow-auto">
						<div class="menu-item">
							<div class="menu-content">
								<span class="menu-section fs-5 fw-bolder ps-1 py-1">Manajemen Proyek</span>
							</div>
						</div>
						<div class="menu-item">
							<a href="{{ route('projects.index') }}" class="menu-link">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Proyek</span>
							</a>
						</div>
					</div>
				</div>
				<div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item py-2">
					<span class="menu-link menu-center">
						<span class="menu-icon me-0">
							<i class="ki-outline ki-notepad fs-2x"></i>
						</span>
					</span>
					<div class="menu-sub menu-sub-dropdown menu-sub-indention px-2 py-4 w-250px mh-75 overflow-auto">
						<div class="menu-item">
							<div class="menu-content">
								<span class="menu-section fs-5 fw-bolder ps-1 py-1">Manajemen Tugas</span>
							</div>
						</div>
						<div class="menu-item menu-accordion">
							<div class="menu-item">
								<a href="{{ route('tasks.index') }}" class="menu-link">
									<span class="menu-bullet">
										<span class="bullet bullet-dot"></span>
									</span>
									<span class="menu-title">Daftar Tugas</span>
								</a>
							</div>
							<span class="menu-link">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Riwayat</span>
							</span>
							<span class="menu-link">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Tugas Yang Saya Bisukan</span>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="app-sidebar-footer d-flex flex-center flex-column-auto pt-6 mb-7" id="kt_app_sidebar_footer">
		<div class="mb-0">
			<button type="button" class="btn btm-sm btn-custom btn-icon" data-kt-menu-trigger="click" data-kt-menu-overflow="true" data-kt-menu-placement="top-start" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-dismiss="click" title="Quick actions">
				<i class="ki-outline ki-setting-2 fs-1"></i>
			</button>
			<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
				<div class="menu-item px-3">
					<div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">Quick Actions</div>
				</div>
				<div class="separator mb-3 opacity-75"></div>
				<div class="menu-item px-3">
					<a href="#" class="menu-link px-3">New Ticket</a>
				</div>
				<div class="menu-item px-3">
					<a href="#" class="menu-link px-3">New Customer</a>
				</div>
				<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
					<a href="#" class="menu-link px-3">
						<span class="menu-title">New Group</span>
						<span class="menu-arrow"></span>
					</a>
					<div class="menu-sub menu-sub-dropdown w-175px py-4">
						<div class="menu-item px-3">
							<a href="#" class="menu-link px-3">Admin Group</a>
						</div>
						<div class="menu-item px-3">
							<a href="#" class="menu-link px-3">Staff Group</a>
						</div>
						<div class="menu-item px-3">
							<a href="#" class="menu-link px-3">Member Group</a>
						</div>
					</div>
				</div>
				<div class="menu-item px-3">
					<a href="#" class="menu-link px-3">New Contact</a>
				</div>
				<div class="separator mt-3 opacity-75"></div>
				<div class="menu-item px-3">
					<div class="menu-content px-3 py-3">
						<a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
{{-- @elseif(auth()->user()->role === 'karyawan')
<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="100px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
	<div class="app-sidebar-logo d-none d-lg-flex flex-center pt-10 mb-3" id="kt_app_sidebar_logo">
		<a href="index.html">
			<img alt="Logo" src="{{asset('/media/logos/default-small.svg" class="h-30px" />
		</a>
	</div>
	<div class="app-sidebar-menu d-flex flex-center overflow-hidden flex-column-fluid">
		<div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper d-flex hover-scroll-overlay-y scroll-ps mx-2 my-5" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu, #kt_app_sidebar" data-kt-scroll-offset="5px">
			<div class="menu menu-column menu-rounded menu-active-bg menu-title-gray-700 menu-arrow-gray-500 menu-icon-gray-500 menu-bullet-gray-500 menu-state-primary my-auto" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
				<div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item here show py-2">
					<span class="menu-link menu-center">
						<span class="menu-icon me-0">
							<i class="ki-outline ki-home-2 fs-2x"></i>
						</span>
					</span>
					<div class="menu-sub menu-sub-dropdown px-2 py-4 w-250px mh-75 overflow-auto">
						<div class="menu-item">
							<div class="menu-content">
								<span class="menu-section fs-5 fw-bolder ps-1 py-1">Home</span>
							</div>
						</div>
						<div class="menu-item">
							<a href="{{ route('Dashboard') }}" class="menu-link">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Dashboard</span>
							</a>
						</div>
					</div>
				</div>
				<div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item py-2">
					<span class="menu-link menu-center">
						<span class="menu-icon me-0">
							<i class="ki-outline ki-user-tick fs-2x"></i>
						</span>
					</span>
					<div class="menu-sub menu-sub-dropdown menu-sub-indention px-2 py-4 w-250px mh-75 overflow-auto">
						<div class="menu-item">
							<div class="menu-content">
								<span class="menu-section fs-5 fw-bolder ps-1 py-1">Manajemen Pengguna</span>
							</div>
						</div>
						<div class="menu-item menu-accordion">
							<a href="{{ route('karyawans.index') }}" class="menu-link">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Data Pengguna</span>
							</a>
							<span class="menu-link">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Atvitas Pengguna</span>
							</span>
						</div>
					</div>
				</div>
				<div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item py-2">
					<span class="menu-link menu-center">
						<span class="menu-icon me-0">
							<i class="ki-outline ki-office-bag fs-2x"></i>
						</span>
					</span>
					<div class="menu-sub menu-sub-dropdown menu-sub-indention px-2 py-4 w-250px mh-75 overflow-auto">
						<div class="menu-item">
							<div class="menu-content">
								<span class="menu-section fs-5 fw-bolder ps-1 py-1">Manajemen Proyek</span>
							</div>
						</div>
						<div class="menu-item">
							<a href="{{ route('projects.index') }}" class="menu-link">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Proyek</span>
							</a>
						</div>
					</div>
				</div>
				<div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item py-2">
					<span class="menu-link menu-center">
						<span class="menu-icon me-0">
							<i class="ki-outline ki-notepad fs-2x"></i>
						</span>
					</span>
					<div class="menu-sub menu-sub-dropdown menu-sub-indention px-2 py-4 w-250px mh-75 overflow-auto">
						<div class="menu-item">
							<div class="menu-content">
								<span class="menu-section fs-5 fw-bolder ps-1 py-1">Manajemen Tugas</span>
							</div>
						</div>
						<div class="menu-item menu-accordion">
							<span class="menu-link">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Daftar Tugas</span>
							</span>
							<span class="menu-link">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Riwayat</span>
							</span>
							<span class="menu-link">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Tugas Yang Saya Bisukan</span>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="app-sidebar-footer d-flex flex-center flex-column-auto pt-6 mb-7" id="kt_app_sidebar_footer">
		<div class="mb-0">
			<button type="button" class="btn btm-sm btn-custom btn-icon" data-kt-menu-trigger="click" data-kt-menu-overflow="true" data-kt-menu-placement="top-start" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-dismiss="click" title="Quick actions">
				<i class="ki-outline ki-setting-2 fs-1"></i>
			</button>
			<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px" data-kt-menu="true">
				<div class="menu-item px-3">
					<div class="menu-content fs-6 text-gray-900 fw-bold px-3 py-4">Quick Actions</div>
				</div>
				<div class="separator mb-3 opacity-75"></div>
				<div class="menu-item px-3">
					<a href="#" class="menu-link px-3">New Ticket</a>
				</div>
				<div class="menu-item px-3">
					<a href="#" class="menu-link px-3">New Customer</a>
				</div>
				<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
					<a href="#" class="menu-link px-3">
						<span class="menu-title">New Group</span>
						<span class="menu-arrow"></span>
					</a>
					<div class="menu-sub menu-sub-dropdown w-175px py-4">
						<div class="menu-item px-3">
							<a href="#" class="menu-link px-3">Admin Group</a>
						</div>
						<div class="menu-item px-3">
							<a href="#" class="menu-link px-3">Staff Group</a>
						</div>
						<div class="menu-item px-3">
							<a href="#" class="menu-link px-3">Member Group</a>
						</div>
					</div>
				</div>
				<div class="menu-item px-3">
					<a href="#" class="menu-link px-3">New Contact</a>
				</div>
				<div class="separator mt-3 opacity-75"></div>
				<div class="menu-item px-3">
					<div class="menu-content px-3 py-3">
						<a class="btn btn-primary btn-sm px-4" href="#">Generate Reports</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endif --}}