<!doctype html>
<html lang="en">
  <head>
  	<title>Multi-Auth App</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/multiselect-dropdown.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <style>
      .multiselect-dropdown{
        width:100% !important;
      }
    </style>
  </head>
  <body>

		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
	  		<h1><a href="" class="logo">Admin Dashboard</a></h1>
        <ul class="list-unstyled components mb-5">

            @if(auth()->user()->role == 1)
                <li>
                    <a href="{{ route('superAdminUsers') }}"><span class="fa fa-users mr-3"></span> Users</a>
                </li>
                <li>
                    <a href="{{ route('manageRole') }}"><span class="fa fa-role mr-3"></span> Manage Role</a>
                </li>
                <li>
                    <a href="{{ route('managePermission') }}"><span class="fa fa-role mr-3"></span> Manage Permission</a>
                </li>
            @endif

            <li>
                <a href="/logout"><span class="fa fa-sign-out mr-3"></span> Logout</a>
            </li>
        </ul>

    	</nav>

        <!-- Page Content  -->
            <div id="content" class="p-4 p-md-5 pt-5">
                @yield('space-work')
            </div>
		</div>

    <!-- <script src="{{ asset('js/jquery.min.js') }}"></script> -->
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right", // Change to "toast-top-left", "toast-bottom-right", etc., if needed
                "timeOut": "5000", // 5 seconds
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            @if (session('success'))
                toastr.success('{{ session('success') }}');
            @elseif (session('error'))
                toastr.error('{{ session('error') }}');
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    toastr.error('{{ $error }}');
                @endforeach
            @endif
        });
    </script>
  </body>
</html>
