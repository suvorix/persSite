@extends('layouts.mainTemplatePage')

@section('pageTitle', 'Студентам')

@section('pageContent')
<main class="main" style="margin-top: 76px;">
		<section class="metod-content">
			<div class="content_position">
				<h2 style="margin-bottom: 20px; text-transform: uppercase;">Студентам</h2>
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
						@if(!Session::has('permission') || Session::get('permission') == '')
							<h3>В доступе отказано</h3>
							<p>Данную страницу могут просматривать только авторизированные пользователи</p>
							<a class="sign_button sign_button_main" style="background: #9f17ff;padding: 10px 20px;margin: 15px 0;cursor: pointer;color: #fff;text-decoration: none;border-radius: 3px;display: inline-block;">Авторизироваться</a>
						@else
							{!! $content->pg_text !!}
						@endif
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

@section('pageScripts')
	@if(!(!Session::has('permission') || Session::get('permission') == ''))
	<script>
		$(document).ready(function(){
			$('p[data-pageID]').click(function(){
				var id = $(this).attr('data-pageID');
				$.ajax({
					type: 'POST',
					url: '/api/page/getPage',
					data: 'id=' + id,
					success: function(result)
					{
						$('.t-c_content').empty();
						$('.t-c_content').append(result.data);
					},
					error: function(){
							console.error('AJAX Fatal error');
					}
				});
			});
		});
	</script>
	@endif
@endsection