@extends('layouts.mainTemplatePage')

@section('pageTitle', 'Отзывы')

@section('pageContent')
<main class="main" style="margin-top: 76px;">
		<section class="r-form">
			<div class="content_position">
				<h2 style="margin-bottom: 20px; text-transform: uppercase; color: #222;">Оставить отзыв</h2>
				<textarea placeholder="Введите сообщение"></textarea>
				<button>Отправить</button>
			</div>
		</section>
		<section class="r-all-reviews">
			<div class="content_position">
				<h2 style="margin-bottom: 20px; text-transform: uppercase; color: #222;">Все отзывы</h2>
				<div class="reviews" style="color: #424242;">
				@foreach($comments as $comment)
					<div class="review">
						<h4 class="user_info">{{ $comment->cmt_name }}<span class="color-accent">&nbsp;/&nbsp;</span><span class="user-email">{{ $comment->cmt_email }}</span></h4>
						<p>{{ $comment->cmt_text }}</p>
					</div>
				@endforeach
				</div>
			</div>
		</section>
	</main>
@endsection