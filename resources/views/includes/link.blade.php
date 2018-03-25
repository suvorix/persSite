<a href="{{ url('/') }}" class="nav_link {{ Request::path() == '/' ? 'active' : '' }}">Главная</a>
					<a href="{{ url('methodological') }}" class="nav_link {{ Request::path() == 'methodological' ? 'active' : '' }}">Методический уголок</a>
					<a href="{{ url('student') }}" class="nav_link {{ Request::path() == 'student' ? 'active' : '' }}">Студентам</a>
					<a href="{{ url('parents') }}" class="nav_link {{ Request::path() == 'parents' ? 'active' : '' }}">Родителям</a>
					<a href="{{ url('comments') }}" class="nav_link {{ Request::path() == 'comments' ? 'active' : '' }}">Отзывы</a>