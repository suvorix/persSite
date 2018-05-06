@extends('layouts.mainTemplatePage')

@section('pageTitle', 'Отзывы')

@section('pageContent')
<main class="main" style="margin-top: 76px;">
		<section class="r-form">
			<div class="content_position">
				<h2 style="margin-bottom: 20px; text-transform: uppercase; color: #222;">Оставить отзыв</h2>
				<form action="/api/comment/addComment" class="suv-ajax" id="addComment">
					<div style="display: flex;">
						<p style="flex: 1;margin-right: 10px;"><input type="text" name="name" placeholder="Введите имя..."></p>
						<p style="flex: 1;margin-left: 10px;"><input type="email" name="email" placeholder="Введите E-mail..."></p>
					</div>
					<textarea name="comment" placeholder="Введите сообщение" style="height: 100px;"></textarea>
					<div class="g-recaptcha" data-sitekey="6LcqsE4UAAAAAL78tIyYH-eRoSTWXGZUAk2SazZP"></div>
					<button type="submit">Отправить</button>
				</form>
			</div>
		</section>
		<section class="r-all-reviews">
			<div class="content_position">
				<h2 style="margin-bottom: 20px; text-transform: uppercase; color: #222;">Все отзывы</h2>
				<div class="reviews" style="color: #424242;">
				@foreach($comments as $comment)
					<div class="review">
						<h4 class="user_info">{{ $comment->cmt_name }}<span class="color-accent">&nbsp;/&nbsp;</span><span class="user-email">{{ $comment->cmt_email }}</span></h4>
						<p>{!! strip_tags(nl2br($comment->cmt_text), '<br>') !!}</p>
					</div>
				@endforeach
				</div>
			</div>
		</section>
	</main>
@endsection

@section('pageScripts')
<script defer src='https://www.google.com/recaptcha/api.js'></script>
@endsection