<!DOCTYPE html>
<html lang="en">
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
		<title>Mitra | JamuPedia</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="{{asset('images/Logo1.png')}}" />
		<link rel="stylesheet" href="{{ asset('css/app.css') }}"type="text/css"/>

		<!--Font-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

		<!--Only This-->
        @yield('extraCSS')

		<!--Global-->
		<link href="{{asset('vendor/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('vendor/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('vendor/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />
		{{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"type="text/css"/> --}}
		
        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
	</head>
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px" :class="{ 'sidebar-expanded': sidebarExpanded }"
	x-data="{ sidebarOpen: false, sidebarExpanded: localStorage.getItem('sidebar-expanded') == 'true' }"
	x-init="$watch('sidebarExpanded', value => localStorage.setItem('sidebar-expanded', value))" >
		<script>
            if (localStorage.getItem('sidebar-expanded') == 'true') {
                document.querySelector('body').classList.add('sidebar-expanded');
            } else {
                document.querySelector('body').classList.remove('sidebar-expanded');
            }
        </script>
		
		<div class="d-flex flex-column flex-root">
			<div class="page d-flex flex-row flex-column-fluid"> <!--Sidebar-->
                {{-- @include('admin.components.sidebar') <!--Container--> --}}
                @include('components.app.sidebar') <!--Container-->
				{{-- <x-app.sidebar /> --}}
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					@include('mitra.components.navbar') <!--Navbar-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        @yield('toolbar') <!--Toolbar-->
						<div class="container">
							@if (session('status'))
							<div class="alert alert-dismissible bg-success d-flex flex-column flex-sm-row w-100 p-5 mb-10">
								<span class="svg-icon svg-icon-2hx svg-icon-light me-4 mb-5 mb-sm-0 mt-2">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path opacity="0.3" d="M12 22C13.6569 22 15 20.6569 15 19C15 17.3431 13.6569 16 12 16C10.3431 16 9 17.3431 9 19C9 20.6569 10.3431 22 12 22Z" fill="black" />
										<path d="M19 15V18C19 18.6 18.6 19 18 19H6C5.4 19 5 18.6 5 18V15C6.1 15 7 14.1 7 13V10C7 7.6 8.7 5.6 11 5.1V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V5.1C15.3 5.6 17 7.6 17 10V13C17 14.1 17.9 15 19 15ZM11 10C11 9.4 11.4 9 12 9C12.6 9 13 8.6 13 8C13 7.4 12.6 7 12 7C10.3 7 9 8.3 9 10C9 10.6 9.4 11 10 11C10.6 11 11 10.6 11 10Z" fill="black" />
									</svg>
								</span>
								<div class="d-flex flex-column text-light pe-0 pe-sm-10">
									<h4 class="mb-2 text-light">Berhasil !</h4>
									<span>{{session('status')}}</span>
								</div>
								<button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
									<span class="svg-icon svg-icon-2x svg-icon-light">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
											<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
										</svg>
									</span>
								</button>
							</div>
							@elseif (session('error'))
							<div class="alert alert-dismissible bg-danger d-flex flex-column flex-sm-row w-100 p-5 mb-10">
								<span class="svg-icon svg-icon-2hx svg-icon-light me-4 mb-5 mb-sm-0 mt-2">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path opacity="0.3" d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z" fill="black" />
										<path d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z" fill="black" />
									</svg>
								</span>
								<div class="d-flex flex-column text-light pe-0 pe-sm-10">
									<h4 class="mb-2 text-light">Terjadi Kesalahan !</h4>
									<span>{{session('error')}}</span>
								</div>
								<button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
									<span class="svg-icon svg-icon-2x svg-icon-light">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
											<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
										</svg>
									</span>
								</button>
							</div>
							@endif
						</div>
						@yield('content') <!--Content-->
					</div>
                    @include('admin.components.footer') <!--Footer-->
				</div>
			</div>
		</div>
        @include('admin.components.scroll-top') <!--Scrolltop-->

		<!--JS-->
		<!--Global-->
		<script src="{{asset('vendor/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('vendor/js/scripts.bundle.js')}}"></script>
		<script src="{{asset('vendor/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
        
		<!--Only + Custom This Page-->
        @yield('extraJS')

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	
	
        @livewireScripts
	</body>
</html>