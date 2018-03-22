@extends('admin.layouts.mainAdminPageTemplate')


@section('adminPageTitle', 'Все альбомы')

@section('adminPageContent')
<div class="col-md-6 col-md-offset-3">
	<div>
		<a href="/admin/albums" class="btn btn-white">Назад</a>
	</div>
	<br>
	<div class="ibox-content">
		<h3 class="m-t-none m-b">Добавить альбом</h3>
		<form role="form">
				<div class="form-group"><label>Название</label> <input type="text" placeholder="Введите название альбома" name="name" class="form-control"></div>
				<div class="form-group"><label>Обложка</label> <input type="file" placeholder="Password" name="image" class="form-control"></div>
				<div>
						<button class="btn btn-primary" type="submit"><strong>Log in</strong></button>
				</div>
		</form>
	</div>
</div>
@endsection

@section('adminPageScripts')
<link href="/admin/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
<script src="/admin/js/plugins/jasny/jasny-bootstrap.min.js"></script>
@endsection