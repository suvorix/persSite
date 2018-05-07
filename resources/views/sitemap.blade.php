@extends('layouts.mainTemplatePage')


@section('pageTitle', 'Карта сайта')

@section('pageContent')
<main class="main" style="margin-top: 76px;">
		<section class="metod-content">
			<div class="content_position">
				<h2 style="margin-bottom: 20px; text-transform: uppercase;">Карта сайта</h2>
				<div class="main_two-columns">
					<style>
						li{list-style: none;}
					</style>
					<div class="t-c_content">
						<ul>
							<li><a href="{{ url('/') }}">Главная</a></li>
							<li><a href="{{ url('methodological') }}">Методический уголок</a>
							@if(count($sidebarListPageCat1) > 0 || count($sidebarListPageNoCat1) > 0)
								<ul>
									@foreach($sidebarListPageCat1 as $category)
									<li>{{ $category[0]->ctg_name }}
										<ul>
											@foreach($category[1] as $page)
											<li>{{ $page->pg_name }}</li>
											@endforeach
										</ul>
									</li>
									@endforeach
									@foreach($sidebarListPageNoCat1 as $page)
									<li>{{ $page->pg_name }}</li>
									@endforeach
								</ul>
							@endif
							</li>
							<li><a href="{{ url('student') }}">Студентам</a>
							@if(count($sidebarListPageCat2) > 0 || count($sidebarListPageNoCat2) > 0)
								<ul>
									@foreach($sidebarListPageCat2 as $category)
									<li>{{ $category[0]->ctg_name }}
										<ul>
											@foreach($category[1] as $page)
											<li>{{ $page->pg_name }}</li>
											@endforeach
										</ul>
									</li>
									@endforeach
									@foreach($sidebarListPageNoCat2 as $page)
									<li>{{ $page->pg_name }}</li>
									@endforeach
								</ul>
							@endif
							</li>
							<li><a href="{{ url('parents') }}">Родителям</a>
							@if(count($sidebarListPageCat3) > 0 || count($sidebarListPageNoCat3) > 0)
								<ul>
									@foreach($sidebarListPageCat3 as $category)
									<li>{{ $category[0]->ctg_name }}
										<ul>
											@foreach($category[1] as $page)
											<li>{{ $page->pg_name }}</li>
											@endforeach
										</ul>
									</li>
									@endforeach
									@foreach($sidebarListPageNoCat3 as $page)
									<li>{{ $page->pg_name }}</li>
									@endforeach
								</ul>
							@endif
							</li>
							<li><a href="{{ url('comments') }}">Отзывы</a></li>
						</ul>
					</div>
					
				</div>
			</div>
	</section>
</main>

@endsection

@section('pageScripts')

@endsection