    <!-- Mainly scripts -->
    <script src="/admin/js/jquery-3.1.1.min.js"></script>
    <script src="/admin/js/bootstrap.min.js"></script>
    <script src="/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    
		<!-- Alertify js -->
		<script src="/admin/js/plugins/alertify/js/alertify.js"></script>
   
    <script>
		$('form.suv-ajax').submit(function(){
			var idForm = '#' + $(this).attr('id');
			$(idForm + ' button[type="submit"]').attr('disabled', true);
			var $that = $(idForm);
			var formData = new FormData($that.get(0));
			$.ajax({
				url: $(this).attr('action'),
				type: 'POST',
				dataType: 'text',
				data: formData,
				contentType: false,
				processData: false,
				headers: {
					'X-CSRF-Token': $('meta[name="_token"]').attr('content')
				},
				success: function(result) {
					var data = $.parseJSON(result);
					if(data.goto){ window.location.href = data.goto; }
					if(data.status == 'success'){
					alertify.success(data.text);
					}
					else{
						alertify.error(data.text);
					}
				},
				complete: function(){
					$(idForm + ' button[type="submit"]').attr('disabled', false);
					$(idForm + ' button[type="reset"]').click();
				}
			});
			return false;
		});
		</script>
		
    <!-- Custom and plugin javascript 
    <script src="/admin/js/inspinia.js"></script>
    <script src="/admin/js/plugins/pace/pace.min.js"></script>

    !-- Flot --
    <script src="/admin/js/plugins/flot/jquery.flot.js"></script>
    <script src="/admin/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="/admin/js/plugins/flot/jquery.flot.resize.js"></script>

    !-- ChartJS--
    <script src="/admin/js/plugins/chartJs/Chart.min.js"></script>

    !-- Peity --
    <script src="/admin/js/plugins/peity/jquery.peity.min.js"></script>
    !-- Peity demo --
    <script src="/admin/js/demo/peity-demo.js"></script>
		-->