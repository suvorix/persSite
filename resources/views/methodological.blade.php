@extends('layouts.mainTemplatePage')

@section('pageTitle', 'Методический уголок')

@section('pageContent')
<main class="main" style="margin-top: 76px;">
		<section class="metod-content">
			<div class="content_position">
				<h2 style="margin-bottom: 20px; text-transform: uppercase; color: #222;">Методический уголок</h2>
				<div class="main_two-columns">
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
					<div class="t-c_content">
						
						<h3>Lorem ipsum</h3>
						<p><strong>Lorem ipsum</strong> dolor sit amet, consectetur adipisicing elit. Id fugit velit aliquam deleniti maxime asperiores adipisci necessitatibus reprehenderit ratione impedit, <a href="#">officia eum dolorum</a>, debitis sapiente quae pariatur cupiditate commodi illum.</p>
						<blockquote>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime hic dignissimos delectus officia, veniam saepe sit, repellendus debitis reiciendis sint ducimus ipsa reprehenderit perferendis nisi natus omnis atque quam a.</blockquote>
						<p><em>Lorem ipsum</em> dolor sit amet, consectetur adipisicing elit. Nostrum, culpa asperiores quae sequi quasi, possimus suscipit tempora officia provident molestiae animi nobis enim ab amet aliquam. Molestias quos illo sunt.</p>
						
						<img src="/img/2.jpg" width="100%" height="auto">
												
						<h4>Lorem ipsum</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam eveniet velit quas ratione, laudantium facere sapiente minima in fugiat, praesentium labore odit eos tempore amet voluptatem assumenda esse provident consectetur.</p>
						<ol>
							<li>Item-01</li>
							<li>Item-02</li>
							<li>Item-03</li>
							<li>Item-04</li>
							<li>Item-05</li>
						</ol>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam eveniet velit quas ratione, laudantium facere sapiente minima in fugiat, praesentium labore odit eos tempore amet voluptatem assumenda esse provident consectetur.</p>
						<ul>
							<li>Item-01</li>
							<li>Item-02</li>
							<li>Item-03</li>
							<li>Item-04</li>
							<li>Item-05</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
	</main>
@endsection