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
	
	<!-- Alertify js -->
	<script defer src="/admin/js/plugins/alertify/js/alertify.js"></script>

	<script>
	$('form.suv-ajax').submit(function(){
		var idForm = '#' + $(this).attr('id');
		$(idForm + ' button[type="submit"]').attr('disabled', true);
		var $that = $(idForm);
		var formData = new FormData($that.get(0));
		$.ajax({
			url: $(this).attr('action'),
			type: 'POST',
			dataType: 'text',
			data: formData,
			contentType: false,
			processData: false,
			headers: {
				'X-CSRF-Token': $('meta[name="_token"]').attr('content')
			},
			success: function(result) {
				var data = $.parseJSON(result);
				if(data.goto){ window.location.href = data.goto; }
				if(data.status == 'success'){
				alertify.success(data.text);
				}
				else{
					alertify.error(data.text);
				}
			},
			complete: function(){
				$(idForm + ' button[type="submit"]').attr('disabled', false);
				$(idForm + ' button[type="reset"]').click();
			}
		});
		return false;
	});
	</script>
@endsection