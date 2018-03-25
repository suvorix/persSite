@extends('admin.layouts.mainAdminPageTemplate')


@section('adminPageTitle', 'Изменить раздел')

@section('adminPageContent')
<div class="col-md-6 col-md-offset-3">
	<div>
		<a href="/admin/categories" class="btn btn-white">Назад</a>
	</div>
	<br>
	<form action="/api/category/edit" class="suv-ajax" id="editcategory" style="background: #fff;border: 1px solid #e7eaec;border-radius: 3px;padding: 20px;">
		<h3 class="m-t-none m-b">Изменить раздел</h3>
		<input type="hidden" name="id" value="{{ $category->id_category }}">
		<div class="form-group">
			<label>Имя</label>
			<input type="text" placeholder="Введите имя" name="name" required class="form-control"  value="{{ $category->ctg_name }}">
		</div>
		<div class="form-group">
			<label>Страница</label>
			<select class="form-control" name="page" required>
				<option value="methodological" {{ $category->ctg_page == 'methodological' ? 'selected' : '' }}>Методический уголок</option>
				<option value="student" {{ $category->ctg_page == 'student' ? 'selected' : '' }}>Студентам</option>
				<option value="parents" {{ $category->ctg_page == 'parents' ? 'selected' : '' }}>Родителям</option>
			</select>
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