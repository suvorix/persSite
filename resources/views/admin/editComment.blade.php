@extends('admin.layouts.mainAdminPageTemplate')


@section('adminPageTitle', 'Изменить отзыв')

@section('adminPageContent')
<div class="col-md-6 col-md-offset-3">
	<div>
		<a href="/admin/comments" class="btn btn-white">Назад</a>
	</div>
	<br>
	<form action="/api/comment/edit" class="suv-ajax" id="editComment" style="background: #fff;border: 1px solid #e7eaec;border-radius: 3px;padding: 20px;">
		<h3 class="m-t-none m-b">Изменить альбом</h3>
		<input type="hidden" name="id" value="{{ $comment->id_comment }}">
		<div class="form-group">
			<label>Имя</label>
			<input type="text" placeholder="Введите имя" name="name" required class="form-control"  value="{{ $comment->cmt_name }}">
		</div>
		<div class="form-group">
			<label>E-mail</label>
			<input type="email" placeholder="Введите E-mail" name="email" required class="form-control"  value="{{ $comment->cmt_email }}">
		</div>
		<div class="form-group">
			<label>Отзыв</label>
			<textarea placeholder="Введите отзыв" name="comment" required class="form-control" style="resize: none; height: 200px;">{{ $comment->cmt_text }}</textarea>
		</div>
		<div>
				<button class="btn btn-primary" type="submit"><strong>Изменить</strong></button>
				<button class="btn btn-white" type="reset"><strong>Отчистить поля</strong></button>
		</div>
	</form>
</div>
@endsection

@section('adminPageScripts')

@endsection