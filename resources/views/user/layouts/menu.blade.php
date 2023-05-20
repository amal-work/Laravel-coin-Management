<!-- Sidebar -->
<div class="sidebar">
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link text-white {{ (request()->routeIs('user.notice')) ? 'active bg-gradient-primary' : '' }}" href="{{ route('user.notice') }}">
				<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
					<i class="material-icons opacity-10">language</i>
				</div>
				<span class="nav-link-text ms-1">News</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link text-white {{ (request()->routeIs('user.card')) ? 'active bg-gradient-primary' : '' }}" href="{{route('user.card')}}">
				<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
					<i class="material-icons opacity-10">paid</i>
				</div>
				<span class="nav-link-text ms-1">Buy Cards</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link text-white {{ (request()->routeIs('user.my_card')) ? 'active bg-gradient-primary' : '' }}" href="{{route('user.my_card')}}">
				<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
					<i class="material-icons opacity-10">receipt</i>
				</div>
				<span class="nav-link-text ms-1">My Cards</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link text-white {{ (request()->routeIs('user.credit')) ? 'active bg-gradient-primary' : '' }}" href="{{ route('user.credit') }}">
				<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
					<i class="material-icons opacity-10">payment</i>
				</div>
				<span class="nav-link-text ms-1">Get Credits</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link text-white {{ (request()->routeIs('user.checkcard')) ? 'active bg-gradient-primary' : '' }}" href="{{ route('user.checkcard') }}">
				<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
					<i class="material-icons opacity-10">check_circle</i>
				</div>
				<span class="nav-link-text ms-1">Check Cards</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link text-white {{ (request()->routeIs('user.faq')) ? 'active bg-gradient-primary' : '' }}" href="{{ route('user.faq') }}">
				<div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
					<i class="material-icons opacity-10">help_outline</i>
				</div>
				<span class="nav-link-text ms-1">FAQ</span>
			</a>
		</li>	
	</ul>
	<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->

