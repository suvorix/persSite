@extends('admin.layouts.mainAdminPageTemplate')


@section('adminPageTitle', 'Все альбомы')

@section('adminPageContent')

<div>
	<a href="/admin/addAlbum" class="btn btn-primary">Новый альбом</a>
</div>
<br>
<div class="animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">
                        	
                        	@foreach($albums as $album)
                            <div class="file-box">
                                <div class="file">
                                    <a href="/admin/album/{{ $album->id_album }}">
                                        <div class="image">
                                            <img alt="image" class="img-responsive" src="{{ json_decode($album->alb_image)->min }}">
                                        </div>
                                        
                                        <div class="file-name">
																					<p style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;">{{ $album->alb_name }}</p>
																					<p>
																						<small>{{ date('d.m.Y в H:i', $album->alb_date) }}</small>
																						<small style="float: right;"><a onclick="delAlbum({{ $album->id_album }}, this)" style="color: #bf4242;">Удалить</a></small>
                                       		</p>
                                        </div>
                                    </a>
                                    <div class="actions">
																			<i class="fa fa-edit" onclick="editAlbum({{ $album->id_album }})" style="position: absolute;top: 0;right: 0;padding: 10px;color: #fff;font-size: 1.3em;cursor: pointer;background: #1ab394;"></i>
																		</div>
                                </div>
                            </div>
                        	@endforeach
                        </div>
                    </div>
                    </div>

@endsection

@section('adminPageScripts')
<script>
	function editAlbum(id)
	{
		window.location.href = '/admin/editAlbum/' + id;
	}
	function delAlbum(id, elem)
	{
		$.ajax({
			url: '/api/album/del',
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
		$(elem).parent().parent().parent().parent().parent().remove();
	}
</script>
@endsection