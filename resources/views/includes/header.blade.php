<header class="header @yield('headerClass')">
		<div class="content_position">
			<nav class="nav">
				<span class="nav_menu-btn"><i class="fa fa-bars" aria-hidden="true"></i></span>
				<div class="nav_menu-list">
					<h2 class="nav_title">Меню</h2>
					<div class="nav_close"><i class="fa fa-times" aria-hidden="true"></i></div>
					@include('includes.link')
				</div>
				<div class="menu-dark_bg hidden"></div>
			</nav>
			@if(!Session::has('permission') || Session::get('permission') == '') 
			<div class="sign">
				<a class="sign_button sign_button_main">Вход</a>
				<div class="sign_dark hidden">
					<div class="content_position">
						<form class="sign_form" action="/login" method="post">
							{{ csrf_field() }}
							<h2></h2>
							<div class="sign_close"><i class="fa fa-times" aria-hidden="true"></i></div>
							<div class="sign_content">
							
							</div>
						</form>
					</div>
				</div>
			</div>
			@else
			<div style="height: 76px; display: flex; align-items: center; color: #fff;">
				<p>
				Добро пожаловать, {!! Session::get('permission') == 'admin' ? '<a href="/admin/home" style="color: #9f17ff; text-decoration: underline;">'.Session::get('login').'</a>' : Session::get('login') !!}
				&nbsp;&nbsp;&nbsp;<a href="/logout" style="color: #9f17ff; text-decoration: underline;">Выйти</a>
				</p>
			</div>
			@endif
		</div>
	</header>