@extends('admin.layouts.mainAdminPageTemplate')


@section('adminPageTitle', 'Все альбомы')

@section('adminPageContent')

<div>
	<a href="/admin/addComment" class="btn btn-primary">Новый отзыв</a>
</div>
<br>
<div class="ibox float-e-margins">
		<div class="ibox-title">
				<h5>Basic Data Tables example with responsive plugin</h5>
		</div>
		<div class="ibox-content">
				<div class="table-responsive">
					<style>
						table tbody tr td:last-child{ text-align: right; display: flex; justify-content: flex-end; }
						table tbody tr td .fa{ font-size: 1.3em; cursor: pointer; display: flex; align-items: center; justify-content: center; width: 25px; height: 25px; }
						table tbody tr td .fa.fa-edit{ background: #1ab394; color: #fff; }
						table tbody tr td .fa.fa-trash{ background:#c93a3a; color: #fff; }
					</style>
					<table id="example" class="table">
						<thead>
							<tr>
								<th>ID</th>
								<th>Имя</th>
								<th>E-mail</th>
								<th>Отзыв</th>
								<th>Действия</th>
							</tr>
						</thead>
					</table>
				</div>
		</div>
</div>

@endsection

@section('adminPageScripts')
<script src="/admin/js/plugins/dataTables/datatables.min.js"></script>
<script>
	$(document).ready(function() {
		$('#example').DataTable( {
			
			"searching": false,
			"sDom": '<fi><"#clear"><t><prl>',
			"oLanguage": {
				"sProcessing":"Подождите...",
				"sLengthMenu":"Показать _MENU_ записей",
				"sZeroRecords":"Записи отсутствуют.",
				"sEmptyTable":"Записи отсутствуют.",
				"sInfo":"Записи с _START_ до _END_ из _TOTAL_ записей",
				"sInfoEmpty":"Записи с 0 до 0 из 0 записей",
				"sInfoFiltered":"(отфильтровано из _MAX_ записей)",
				"sInfoPostFix":"",
				"sSearch":"Поиск: ",
				"sUrl": "",
				"oPaginate": {
					"sFirst":"Первая",
					"sPrevious":"Предыдущая",
					"sNext":"Следующая",
					"sLast":"Последняя"
				}
			},

			"ajax": "/api/comment/getAllComments",
			"columns": [
					{ "data": "id_comment" },
					{ "data": "cmt_name" },
					{ "data": "cmt_email" },
					{ "data": "cmt_text" },
					{ 
						"data": "id_comment",
						"render": function ( data ) {
							var edit = '<i class="fa fa-edit" onclick="editComment(' + data + ')"></i>';
							var trash = '<i class="fa fa-trash" onclick="delComment(' + data + ', this)"></i>';
							return edit + trash;
						}
					}
				]
		} );
	} );
	function editComment(id)
	{
		window.location.href = '/admin/editComment/' + id;
	}
	function delComment(id, elem)
	{
		$.ajax({
			url: '/api/comment/del',
			type: 'POST',
			dataType: 'html',
			data: 'id=' + id,
			success: function(result) {
				var data = $.parseJSON(result);
				if(data.goto){ window.location.href = data.goto; }
				if(data.status == 'success'){
					$(elem).parent().parent().remove();		
					alertify.success(data.text);
				}
				else{
					alertify.error(data.text);
				}
			}
		});
	}
</script>
@endsection