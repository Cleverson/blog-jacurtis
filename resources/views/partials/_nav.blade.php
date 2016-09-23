<!-- Default Bootstrap Navbar -->
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Laravel Blog</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="{{ Request::is('/') ? "active" : "" }}"><a href="{!! route('/') !!}">Home</a></li>
				<li class="{{ Request::is('blog') ? "active" : "" }}"><a href="{!! route('blog.index') !!}">Blog</a></li>
				<li class="{{ Request::is('about') ? "active" : "" }}"><a href="{!! route('about') !!}">About</a></li>
				<li class="{{ Request::is('contact') ? "active" : "" }}"><a href="{!! route('contact') !!}">Contact</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				@if(Auth::guest())
					<li class="dropdown">
						<a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="{{ url('/login') }}">Login</a></li>
						<li><a href="{{ url('/register') }}">Register</a></li>
				@else
					<li class="dropdown">
						<a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="{{ route('posts.index') }}">Posts</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li role="separator" class="divider"></li>
							<li>
								<a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
								<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</li>
				@endif
						</ul>
					</li>
				</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
