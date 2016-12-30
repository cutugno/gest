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
	
	$("#aggiungi_campo").click(function() {
		var open_form="<form action='http://gest.pc/#' class='form_dettaglicampo' method='post' accept-charset='utf-8'>";
		var nuovo_campo="<tr><td><input type='text' name='campo_descrizione[]' value='' class='form-control input-sm' /></td><td><input type='checkbox' name='a_active' value='1' class='a_active' /></td><td>{select}</td><td class='text-center'><button type='button' class='btn btn-success btn-sm aggiorna_campo' data-idcampo='{id_campo}' style='margin: 0 4px 0 -1px;' ><i class='fa fa-pencil-square-o' aria-hidden='true'></i> SALVA CAMPO</button><button type='button' class='btn btn-danger btn-sm elimina_campo' data-idcampo='{id_campo}' ><i class='fa fa-trash-o' aria-hidden='true'></i> ELIMINA CAMPO</button></td></tr></form>";		
		var select="<select name='a_avvocato' class='a_avvocato form-control input-sm' data-idavv='' style='width:350px; display:none'>{options}</select>";
		// sostituire {options} in select con le opzioni avvocati che ricavo da chiamata rest
		$.get("<?php echo site_url('rest/list_avvocati'); ?>", function(json){
			var data = jQuery.parseJSON(json);
			$.each(data,function(index,value){
				console.log(value);
			});
		});
		// sostituire {id_campo} in nuovo_campo con id_campo reale
		
		var close_form="</form>";
		$("#table_campi tbody").append(open_form);
		$("#table_campi tbody").append(nuovo_campo);
		$("#table_campi tbody").append(close_form);
	});
</script>
