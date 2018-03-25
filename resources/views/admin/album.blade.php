@extends('admin.layouts.mainAdminPageTemplate')


@section('adminPageTitle', $albumName)

@section('adminPageContent')

<div>
	<a href="/admin/albums" class="btn btn-white">Назад</a>
	<a href="/admin/addPhoto/{{ $album }}" class="btn btn-primary">Добавить фотографии</a>
</div>
<br>
                       	<h3>{{ $albumName }}</h3>
<div class="animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">
													<style>
														.file .actions{ background: rgba(0, 0, 0, .7); opacity: 0; position: absolute; top: 0; left: 0; right: 0; bottom: 0; transition: .2s all; }
														.file .actions:hover{ opacity: 1; }
													</style>
                        	@foreach($photos as $photo)
                            <div class="file-box" style="width: 250px;">
                                <div class="file">
                                    <a href="#">
                                       	<div class="actions">
																					<i class="fa fa-trash" onclick="delPhoto({{ $photo->id_photo }}, this)" style="position: absolute;top: 0;right: 0;padding: 10px;color: #fff;font-size: 1.3em;background: #d52020;"></i>
                                       	</div>
                                        <div class="image" style="height: 140px;">
                                            <img alt="image" class="img-responsive" src="{{ json_decode($photo->pht_img)->min }}">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        	@endforeach
                        </div>
                    </div>
                    </div>
@endsection

@section('adminPageScripts')
<script>
	function delPhoto(id, elem)
	{
		$.ajax({
			url: '/api/photo/del',
			type: 'POST',
			dataType: 'html',
			data: 'id=' + id,
			success: function(result) {
				var data = $.parseJSON(result);
				if(data.goto){ window.location.href = data.goto; }
				if(data.status == 'success'){					
					alertify.success(data.text);
				}
				else{
					alertify.error(data.text);
				}
			}
		});
		$(elem).parent().parent().parent().remove();
	}
</script>
@endsection