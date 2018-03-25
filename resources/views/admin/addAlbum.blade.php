@extends('admin.layouts.mainAdminPageTemplate')


@section('adminPageTitle', 'Добавить альбом')

@section('adminPageContent')
<div class="col-md-6 col-md-offset-3">
	<div>
		<a href="/admin/albums" class="btn btn-white">Назад</a>
	</div>
	<br>
	<form action="/api/album/add" class="suv-ajax" id="addAlbum" style="background: #fff;border: 1px solid #e7eaec;border-radius: 3px;padding: 20px;">
		<h3 class="m-t-none m-b">Добавить альбом</h3>
		<div class="form-group">
			<label>Название</label>
			<input type="text" placeholder="Введите название альбома" name="name" required class="form-control">
		</div>
		<div class="form-group">
			<label>Обложка альбома</label>
			<div class="formSelectLoadImage"></div>
		</div>
		<div>
				<button class="btn btn-primary" type="submit"><strong>Добавить</strong></button>
				<button class="btn btn-white" type="reset"><strong>Отчистить поля</strong></button>
		</div>
	</form>
</div>
@endsection

@section('adminPageScripts')
<script>
	$(document).ready(function(){
		$('.formSelectLoadImage-btn').click(function(){
			$('.formSelectLoadImage-btn.active').removeClass('active');
			$(this).addClass('active');
			if($(this).attr('data-slimage') == 'url'){
				$('.selectedItem').empty();
				$('.selectedItem').append('<div><input parsley-type="url" type="url" name="image" class="form-control" maxlength="255" required placeholder="Введите ссылку на картинку"/><input type="hidden" name="imageType" value="url"/></div>');
			}
			else{
				$('.selectedItem').empty();
				$('.selectedItem').append('<div><input type="file" name="image" class="form-control" required/><input type="hidden" name="imageType" value="file"/></div>');
			}
		});
	});
	var formSLI = $('.formSelectLoadImage');
	if(formSLI.length) {
		formSLI.empty();
		formSLI.append('<div class="formSelectLoadImage-btns"><div class="formSelectLoadImage-btn active" data-slimage="url">Ссылка</div><div class="formSelectLoadImage-btn" data-slimage="file">Файл</div></div><div class="selectedItem"><div><input parsley-type="url" type="url" name="image" class="form-control" maxlength="255" required placeholder="Введите ссылку на картинку"/><input type="hidden" name="imageType" value="url"/></div></div>')
	}
</script>
@endsection