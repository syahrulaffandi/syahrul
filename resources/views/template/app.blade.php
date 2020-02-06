<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AC store</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{URL::asset('bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{URL::asset('fonts/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{URL::asset('fonts/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{URL::asset('dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
	   folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{URL::asset('dist/css/skins/_all-skins.min.css')}}">

  @stack('customcss')

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-yellow sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
	<!-- Logo -->
	<a href="index2.html" class="logo">
	  <!-- mini logo for sidebar mini 50x50 pixels -->
	  <span class="logo-mini"><b>ACS</b></span>
	  <!-- logo for regular state and mobile devices -->
	  <span class="logo-lg"><b>AC</b> store</span>
	</a>
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top">
	  <!-- Sidebar toggle button-->
	  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </a>

	  <div class="navbar-custom-menu">
		<ul class="nav navbar-nav">
		  <!-- User Account: style can be found in dropdown.less -->
		  <li class="dropdown user user-menu">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			  <img src="{{URL::asset('dist/img/saskeh.jpeg')}}" class="user-image" alt="User Image">
			<span class="hidden-xs">{{ Auth::user()->name}}</span>
			</a>
			<ul class="dropdown-menu">
			  <!-- User image -->
			  <li class="user-header">
				<img src="{{URL::asset('dist/img/saskeh.jpeg')}}" class="img-circle" alt="User Image">

				<p>
					{{ Auth::user()-> name}}
				  <small>Member since {{ Auth::user()-> created_at->format('Y')}}</small>
				</p>
			  </li>
			  <!-- Menu Body -->
			  
			  <!-- Menu Footer-->
			  <li class="user-footer">
				{{-- <div class="pull-left">
				  <a href="#" class="btn btn-default btn-flat">Profile</a>
				</div> --}}
				<div class="pull-right">
				  
				  <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
									   onclick="event.preventDefault();
													 document.getElementById('logout-form').submit();">
										{{ __('Sign out') }}
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
				</div>
			  </li>
			</ul>
		  </li>
		  <!-- Control Sidebar Toggle Button -->
		  {{-- <li>
			<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
		  </li> --}}
		</ul>
	  </div>
	</nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
	  <!-- Sidebar user panel -->
	  <div class="user-panel">
		<div class="pull-left image">
		  <img src="{{URL::asset('dist/img/saskeh.jpeg')}}" class="img-circle" alt="User Image">
		</div>
		<div class="pull-left info">
		  <p>{{ Auth::user()-> name}}</p>
		  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
		</div>
	  </div>
	  <!-- search form -->
	  <form action="#" method="get" class="sidebar-form">
	  </form>
	  <!-- /.search form -->
	  <!-- sidebar menu: : style can be found in sidebar.less -->
	  <ul class="sidebar-menu">
		<li class="header">MAIN NAVIGATION</li>
		<li class="treeview"> 
		</li>
			<li>
			<a href="{{route('home')}}">
				  <i class="fa fa-dashboard"></i> <span>Dashboard</span>
				  <span class="pull-right-container">
				  </span>
				</a>
			</li> 
			<li class="treeview">
				<a href="{{route('transactions.index')}}">
					  <i class="fa fa-shopping-cart"></i> <span>Transaction</span>
					  <span class="pull-right-container">
					  </span>
					</a>
				</li>
		<li class="treeview">
		  <a href="#">
			<i class="fa fa-gear"></i> <span>Master</span>
			<span class="pull-right-container">
			  <i class="fa fa-angle-left pull-right"></i>
			</span>
		  </a>
		  <ul class="treeview-menu">
		  <li><a style="margin-left:9.5px;" href="{{route('user.index')}}"><i class="fa fa-user"></i> User</a></li>
		  <li><a style="margin-left:8px;" href="{{route('product.index')}}"><i class="fa fa-dropbox"></i> Product</a></li>
			{{-- <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li> --}}
		  </ul>
		</li>

	  </ul>
	</section>
	<!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
		@yield('page tittle')
		{{-- <small>it all starts here</small> --}}
	  </h1> 

	<!-- Main content -->
	<section class="content">
		@yield('content')
	</section>
	<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
	<div class="pull-right hidden-xs">
	  <b><a href="http://www.fb.com/softsed"></a></b> 
	</div>
	<strong> <a href="http://almsaeedstudio.com"></a></strong> 
  </footer>
 
  <!-- Add the sidebar's background. This div must be placed
	   immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{URL::asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{URL::asset('bootstrap/js/bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{URL::asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{URL::asset('plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App --> 
<script src="{{URL::asset('dist/js/app.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{URL::asset('dist/js/demo.js')}}"></script>

@stack('customscript')
</body>
</html>
