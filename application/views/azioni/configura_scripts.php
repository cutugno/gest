<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script type="text/javascript">
	$("#update_dettagli_azione").click(function() {
		var dati=$("#form_dettagliazione").serialize();
		$.post('<?php echo site_url('azioni/update'); ?>',dati,function(json){
			var data = jQuery.parseJSON(json);
			console.log(data);
			if (data.type=="success") {
			 // modifico dettagli azione	
			 $("#a_descr").val(data.azione.descrizione);
			 $("#a_active").prop('checked',data.azione.active);
			 $("#a_date_edit").html(data.azione.date_edit);
			}
			swal({ title: '', text: data.msg, type: data.type, timer: 2000});

		});
	});
	
	$("input[name='a_active']").change(function(){
		if ($(this).prop("checked")){
			$(this).parent().next().children(".a_avvocato").show();	
		}else{
			$(this).parent().next().children(".a_avvocato").hide();	
		}
	});
</script>
