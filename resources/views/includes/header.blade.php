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
			<div class="sign">
				<a class="sign_button sign_button_main">Вход</a>
				<div class="sign_dark hidden">
					<div class="content_position">
						<div class="sign_form">
							<h2></h2>
							<div class="sign_close"><i class="fa fa-times" aria-hidden="true"></i></div>
							<div class="sign_content">
							
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>