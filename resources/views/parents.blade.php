@extends('layouts.mainTemplatePage')

@section('pageTitle', 'Родителям')

@section('pageContent')
<main class="main" style="margin-top: 76px;">
		<section class="metod-content">
			<div class="content_position">
				<h2 style="margin-bottom: 20px; text-transform: uppercase;">Родителям</h2>
				<div class="main_two-columns">
				@if (isset($content))
					@if (isset($sidebarListPageCat) || isset($sidebarListPageNoCat) )
					<ul class="t-c_sidebar">
						@foreach($sidebarListPageCat as $category)
						<li class="t-c_sidebar_item">
							<p class="sidebar_item-name"><span class="si-name">{{ $category[0]->ctg_name }}</span><span class="si-icon-drop"><i class="fa fa-chevron-down"></i></span></p>
							<ul class="sidebar_item-drop">
								@foreach($category[1] as $page)
								<li class="t-c_sidebar_item">
									<p class="sidebar_item-name" data-pageID="{{ $page->id_page }}"><span class="si-name">{{ $page->pg_name }}</span></p>
								</li>
								@endforeach
							</ul>
						</li>
						@endforeach
						@foreach($sidebarListPageNoCat as $page)
						<li class="t-c_sidebar_item">
							<p class="sidebar_item-name" data-pageID="{{ $page->id_page }}"><span class="si-name">{{ $page->pg_name }}</span></p>
						</li>
						@endforeach
					</ul>
					@endif
					<div class="t-c_content">
						{!! $content->pg_text !!}
					</div>
				@else
					<div class="t-c_content">
						<p>Нет ни одной страницы в данном разделе</p>
					</div>
				@endif
				</div>
			</div>
		</section>
	</main>
@endsection