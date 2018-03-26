@extends('admin.layouts.mainAdminPageTemplate')


@section('adminPageTitle', 'Добавить страницу')

@section('adminPageContent')
<div class="col-md-12">
	<div>
		<a href="/admin/pages" class="btn btn-white">Назад</a>
	</div>
	<br>
	<form action="/api/page/edit" class="suv-ajax" id="editPage" style="background: #fff;border: 1px solid #e7eaec;border-radius: 3px;padding: 20px;">
		<h3 class="m-t-none m-b">Добавить страницу</h3>
		
		<input type="hidden" name="id" value="{{ $page->id_page }}">
		
		<div class="form-group">
			<label>Название</label>
			<input type="text" placeholder="Введите название" name="name" value="{{ $page->pg_name }}" required class="form-control">
		</div>
		
		<div class="form-group">
			<label>Раздел</label>
			<select class="form-control" name="category" required>
				<option value="0">Не прикреплять к разделу</option>
				@foreach($categories as $category)
				<option {{ $category->id_category == $page->pg_catId ? 'selected' : '' }} value="{{ $category->id_category }}">{{ $category->ctg_name }}</option>
				@endforeach
			</select>
		</div>
		
		<div class="form-group">
			<label>Страница</label>
			<select class="form-control" name="page" required>
				<option value="methodological" {{ $page->pg_group == 'methodological' ? 'selected' : '' }}>Методический уголок</option>
				<option value="student" {{ $page->pg_group == 'student' ? 'selected' : '' }}>Студентам</option>
				<option value="parents" {{ $page->pg_group == 'parents' ? 'selected' : '' }}>Родителям</option>
			</select>
		</div>
		
		<div class="form-group">
			<div id="summernote">{!! $page->pg_text !!}</div>
		</div>
		
		<div>
				<button class="btn btn-primary" type="submit"><strong>Добавить</strong></button>
				<button class="btn btn-white" type="reset"><strong>Отчистить поля</strong></button>
		</div>
	</form>
</div>
@endsection

@section('adminPageScripts')
<link href="/admin/css/plugins/summernote/summernote.css" rel="stylesheet">
<link href="/admin/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
<script src="/admin/js/plugins/summernote/summernote.min.js"></script>
<script>
	$(document).ready(function() {
		$('#summernote').summernote({
			tabsize: 2,
			height: 200,
			toolbar:[
				//[groupname,[list buttons]]
				['insert',['picture','link','table']],
				['style',['bold','italic','underline']],
				['font', ['strikethrough', 'superscript', 'subscript']],
				['fontsize', ['fontsize','fontname']],
				['color', ['color']],
				['para', ['ul', 'ol', 'paragraph','style']],
				['height', ['height','codeview', 'fullscreen']],
			],
		});
	});
</script>
@endsection