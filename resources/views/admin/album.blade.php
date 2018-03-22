@extends('admin.layouts.mainAdminPageTemplate')


@section('adminPageTitle', 'Все альбомы')

@section('adminPageContent')

<div>
	<a href="/admin/albums" class="btn btn-white">Назад</a>
	<a href="/admin/addAlbum" class="btn btn-primary">Добавить фотографии</a>
</div>
<br>
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
																					<i class="fa fa-trash" onclick="delPhoto({{ $photo->id_photo }}, this)" style="position: absolute;top: 10px;right: 15px;color: #fff;font-size: 1.3em;"></i>
																					<i class="fa fa-edit" onclick="delPhoto({{ $photo->id_photo }}, this)" style="position: absolute;top: 10px;right: 45px;color: #fff;font-size: 1.3em;"></i>
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
		$(elem).parent().parent().parent().remove();
	}
</script>
@endsection