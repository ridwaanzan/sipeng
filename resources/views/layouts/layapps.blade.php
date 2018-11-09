<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>PT. Sinarsukses Sejahtera</title>
	<link rel="stylesheet" href="{{asset('css/layout.css')}}" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="{{asset('js/jquery-1.5.2.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('js/hideshow.js')}}" type="text/javascript"></script>
	<script src="{{asset('js/jquery.tablesorter.min.js')}}" type="text/javascript"></script>
	<script type="text/javascript" src="{{asset('js/jquery.equalHeight.js')}}"></script>
	<script type="text/javascript">
		$(document).ready(function() 
			{ 
				$(".tablesorter").tablesorter(); 
			} 
		);
		$(document).ready(function() {
			//When page loads...
			$(".tab_content").hide(); //Hide all content
			$("ul.tabs li:first").addClass("active").show(); //Activate first tab
			$(".tab_content:first").show(); //Show first tab content
			//On Click Event
			$("ul.tabs li").click(function() {
				$("ul.tabs li").removeClass("active"); //Remove any "active" class
				$(this).addClass("active"); //Add "active" class to selected tab
				$(".tab_content").hide(); //Hide all tab content
				var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
				$(activeTab).fadeIn(); //Fade in the active ID content
				return false;
			});
		});
	</script>
	<script type="text/javascript">
		$(function(){
			$('.column').equalHeight();
		});
	</script>
</head>
<body>
	<header id="header">
		<hgroup>
			<h1 class="site_title">
				<a href="{{url('dashboard')}}">PT. SinarSukses Sejahtera</a>
			</h1>
			<h2 class="section_title">Dashboard</h2>
		</hgroup>
	</header> <!-- end of header bar -->
	<section id="secondary_bar">
		<div class="user">
			<p>Welcome To SI-GAJIAN</p>
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs">
				<a href="{{url('dashboard')}}">Beranda</a>
				<div class="breadcrumb_divider"></div>
			</article>
		</div>
	</section><!-- end of secondary bar -->
	<aside id="sidebar" class="column">
		@if(Auth::guest())
		@else
			@if(Auth::user()->level == 1 || Auth::user()->level == 2 || Auth::user()->level == 3)
			<h3>Master Data Karyawan</h3>
			<ul class="toggle">
				<li class="icn_categories">
					<a href="{{url('master-karyawan')}}">Data Master Karyawan</a>
				</li>
				<li class="icn_new_article">
					<a href="{{url('master-karyawan/create')}}">Tambah Master Karyawan</a>
				</li>
				<li class="icn_categories">
					<a href="{{url('master-transaksi')}}">Absensi & Gaji</a>
				</li>
			</ul>
			<h3>Master Data Departemen</h3>
			<ul class="toggle">
				<li class="icn_categories">
					<a href="{{url('master-departemen')}}">Data Master Departemen</a>
				</li>
				<li class="icn_new_article">
					<a href="{{url('master-departemen/create')}}">Tambah Master Departemen</a>
				</li>
			</ul>
			<h3>Master Data Jabatan</h3>
			<ul class="toggle">
				<li class="icn_categories">
					<a href="{{url('master-jabatan')}}">Data Master Jabatan</a>
				</li>
				<li class="icn_new_article">
					<a href="{{url('master-jabatan/create')}}">Tambah Master Jabatan</a>
				</li>
			</ul>
			<h3>Master Data Tunjangan</h3>
			<ul class="toggle">
				<li class="icn_categories">
					<a href="{{url('master-tunjangan')}}">Data Master Tunjangan</a>
				</li>
				<li class="icn_new_article">
					<a href="{{url('master-tunjangan/create')}}">Tambah Master Tunjangan</a>
				</li>
			</ul>
			<h3>Admin</h3>
			<ul class="toggle">
			@else
			@endif
				<li class="icn_view_users">
					<a href="{{url('profile/')}}/{{Auth::user()->username}}">
						Lihat Profile
					</a>
				</li>
				<li class="icn_view_users">
					<a href="{{url('gajian/')}}/{{Auth::user()->username}}">
						Lihat Gaji Perorangan
					</a>
				</li>
				<li class="icn_jump_back"><a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('form-logout').submit();">Logout</a></li>
				<form action="{{route('logout')}}" id="form-logout" method="POST" style="display: none;">
					{{csrf_field()}}
				</form>
		@endif
		</ul>
		
		
	</aside><!-- end of sidebar -->
	

	<section id="main" class="column">
		@if($errors->any())
			@foreach($errors->all() as $errors)
			<h4 class="alert_error">{{$errors}}</h4>
			@endforeach
		@endif
		@if(Session::has('success'))
			<h4 class="alert_success">{{Session::get('success')}}</h4>
		@elseif(Session::has('alert'))
			<h4 class="alert_error">{{Session::get('alert')}}</h4>
		@endif

		@yield('content')

		<div class="spacer"></div>
	</section>
</body>
</html>