@extends('admin.layouts.mainAdminPageTemplate')


@section('adminPageTitle', 'Добавить раздел')

@section('adminPageContent')
<div class="col-md-6 col-md-offset-3">
	<div>
		<a href="/admin/categories" class="btn btn-white">Назад</a>
	</div>
	<br>
	<form action="/api/category/add" class="suv-ajax" id="addCategories" style="background: #fff;border: 1px solid #e7eaec;border-radius: 3px;padding: 20px;">
		<h3 class="m-t-none m-b">Добавить раздел</h3>
		<div class="form-group">
			<label>Название</label>
			<input type="text" placeholder="Введите название" name="name" required class="form-control">
		</div>
		<div class="form-group">
			<label>Страница</label>
			<select class="form-control" name="page" required>
				<option value="methodological">Методический уголок</option>
				<option value="student">Студентам</option>
				<option value="parents">Родителям</option>
			</select>
		</div>
		<div>
				<button class="btn btn-primary" type="submit"><strong>Добавить</strong></button>
				<button class="btn btn-white" type="reset"><strong>Отчистить поля</strong></button>
		</div>
	</form>
</div>
@endsection

@section('adminPageScripts')

@endsection