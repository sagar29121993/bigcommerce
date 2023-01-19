<html>
<head>
<?php session_start();
 ?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>MIS-Login</title>
<!-- link href="CSS/FONTS/fonts.css" rel="stylesheet" -->
<link rel="stylesheet" href="{{ asset('public/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css')}}">


<script src="{{ asset('public/js/jquery.min.js')}}"></script>
<script src="{{ asset('public/js/bootstrap.min.js')}}"></script>
<!-- New bootstrap files -->

<style>


.visible-lg {
  @media (max-width: @screen-phone-max) {
    .responsive-invisibility();
  }
  &.visible-xs {
    @media (max-width: @screen-phone-max) {
      .responsive-visibility();
    }    
  }
  @media (min-width: @screen-tablet) and (max-width: @screen-tablet-max) {
    .responsive-invisibility();
  }
  &.visible-sm {
    @media (min-width: @screen-tablet) and (max-width: @screen-tablet-max) {
      .responsive-visibility();
    }    
  }
  @media (min-width: @screen-desktop) and (max-width: @screen-desktop-max) {
    .responsive-invisibility();
  }
  &.visible-md {
    @media (min-width: @screen-desktop) and (max-width: @screen-desktop-max) {
      .responsive-visibility();
    }    
  }
  @media (min-width: @screen-large-desktop) {
    .responsive-visibility();
  }
}




h5{
    font-size: 1.4em;
}      

    body {
		font-family: 'Varela Round', sans-serif;
	}
	.modal-login {		
		color: #636363;
		width: 350px;
	}
	.modal-login .modal-content {
		padding: 20px;
		border-radius: 5px;
		border: none;
	}
	.modal-login .modal-header {
		border-bottom: none;   
        position: relative;
        justify-content: center;
	}
	.modal-login h4 {
		text-align: center;
		font-size: 26px;
		margin: 30px 0 -15px;
	}
	.modal-login .form-control:focus {
		border-color: #70c5c0;
	}
	.modal-login .form-control, .modal-login .btn {
		min-height: 40px;
		border-radius: 3px; 
	}
	.modal-login .close {
        position: absolute;
		top: -5px;
		right: -5px;
	}	
	.modal-login .modal-footer {
		background: #ecf0f1;
		border-color: #dee4e7;
		text-align: center;
        justify-content: center;
		margin: 0 -20px -20px;
		border-radius: 5px;
		font-size: 13px;
	}
	.modal-login .modal-footer a {
		color: #999;
	}		
	.modal-login .avatar {
		position: absolute;
		margin: 0 auto;
		left: 0;
		right: 0;
		top: -70px;
		width: 95px;
		height: 95px;
		border-radius: 50%;
		z-index: 9;
		background: #00838f;
		padding: 15px;
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
	}
	.modal-login .avatar img {
		width: 100%;
	}
	.modal-login.modal-dialog {
		margin-top: 80px;
	}
    .modal-login .btn {
        color: #fff;
        border-radius: 4px;
		background: #00838f;
		text-decoration: none;
		transition: all 0.4s;
        line-height: normal;
        border: none;
    }
	.modal-login .btn:hover, .modal-login .btn:focus {
		background: #45aba6;
		outline: none;
	}
	.trigger-btn {
		display: inline-block;
		margin: 100px auto;
	}
	
</style>

<script type="text/javascript">
	$(document).ready(function() {
		$("#logInModal").modal({
			backdrop: 'static',
			keyboard: false
		});
		$('#logInModal').modal('show');
		$("#userId").focus();
		$('#logInBtn').click(function(e) {
			// prevent click action
			e.preventDefault();
			// your code here
			return false;
		});
	});

	function checkNumber(evt){
		evt = (evt) ? evt : window.event;
		var charCode = (evt.which) ? evt.which : evt.keyCode;
		if (charCode > 31 && (charCode < 48 || charCode > 57)) {
			return false;
		}

		return true;
	}

</script>
</head>

<body class="container-fluid">
<style>
body{
    background-color: #607d8b !important;
}
</style>
<input type = "hidden" name = "user" id = "user" value = "">
	<!-- Modal HTML -->
	<div id="logInModal" class="modal">
		<div class="modal-dialog modal-login">
			<div class="modal-content">
				<div class="modal-header">
					<div class="avatar">
					</div>
					<h4 class="modal-title">Install APP</h4>
					
					<!-- button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button -->
				</div>
				<h6>Your IP Address : <?php echo  $_SERVER['REMOTE_ADDR']; ?></h6>
				<span style="color:green;">Use Google Chrome <img src="public/images/chrome.jfif" alt="chrome" width="25" height="25" > for better User Interface</span>
				<div class="modal-body">
				@if(Session::has('userName'))
					<script>window.location.href = "home";</script>
				@endif
				@if (Session::has('message'))
                <div class="note note-info">
                    <p>{{ Session::get('message') }}</p>
                </div>
				@endif
				@if ($errors->count() > 0)
					<div class="note note-danger">
						<ul class="list-unstyled">
							@foreach($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				@if (isset($wrongpwd))
				<div>
						<p class="text-danger">{{ $wrongpwd }}</p>
				</div>
				@endif
				@if (isset($logoutMsg))
				<div>
						<p class="text-success">{{ $logoutMsg }}</p>
				</div>
				@endif
					<form class="container-fluid" method = "post" action = "{{route('install_page_submit')}}">
					{!! csrf_field() !!}

						<div class="form-group">
							<input type="submit" value="Install App" class="btn btn-primary">		
						</div>
						
					</form>
				</div>
				
			</div>
		</div>
	</div>

</body>
</html>
