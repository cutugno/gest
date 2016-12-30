<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script type="text/javascript">
	var list_avvocati=""; // variabile globale per l'elenco avvocati da usare quando genero nuovo campo dinamicamente
	var id_azione="<?php echo $azione->id; ?>";
	
	$(function() {
	    $.get("<?php echo site_url('rest/list_avvocati'); ?>", function(json){
			list_avvocati = jQuery.parseJSON(json);	// setto elenco avvocati al caricamento della pagina
		});
	});
	
	$("#update_dettagli_azione").click(function() {
		// aggiorno dettagli azione
		var dati=$("#form_dettagliazione").serialize();
		$.post('<?php echo site_url('azioni/update_azione'); ?>',dati,function(json){
			var data = jQuery.parseJSON(json);
			if (data.type=="success") {
			 // modifico vista con nuovi dettagli azione	
			 $("#a_descr").val(data.azione.descrizione);
			 $("#a_active").prop('checked',data.azione.active);
			 $("#a_date_edit").html(data.azione.date_edit);
			}
			swal({ title: '', text: data.msg, type: data.type, timer: 2000});
		});
	});
	
	$("body").on("change", "input[name='a_active']", function(){
		// visualizzo o nascondo dropdown avvocati
		if ($(this).prop("checked")){
			$(this).parent().next().children(".a_avvocato").show();	
		}else{
			$(this).parent().next().children(".a_avvocato").hide();	
		}
	});
	
	$("#aggiungi_campo").click(function() {
		// genero <tr> nuovo campo da appendere a tabella
		var open="<tr><form action='http://gest.pc/#' class='form_dettaglicampo' name='form_dettaglicampo' method='post' accept-charset='utf-8'>";					
		var nuovo_campo="<input type='hidden' name='id_azione' value='"+id_azione+"'><td name='descrizione'><input type='text' name='campo_descrizione' value='' class='form-control input-sm' /></td><td name='active'><input type='checkbox' name='a_active' value='1' class='a_active' /></td><td name='avvocato'><select name='a_avvocato' class='a_avvocato form-control input-sm' data-idavv='' style='width:350px; display:none'>{options}</select></td><td class='text-center'><button type='button' class='btn btn-success btn-sm salva_campo' data-idcampo='' style='margin: 0 4px 0 -1px;' ><i class='fa fa-pencil-square-o' aria-hidden='true'></i> SALVA CAMPO</button><button type='button' class='btn btn-danger btn-sm elimina_campo' data-idcampo='' ><i class='fa fa-trash-o' aria-hidden='true'></i> CANCELLA CAMPO</button></td>";
		var close="</form></tr>";
		var options="";
		// uso variabile globale list_avvocati settata al caricamento della pagina
		$.each(list_avvocati, function(index,value) {
			options += "<option value='"+value.id+"'>"+value.cognome+", "+value.nome+"</option>";
		});
		nuovo_campo=nuovo_campo.replace("{options}", options);
		$("#table_campi tbody").append(open+nuovo_campo+close);
		
	});
	
	$("body").on("click", ".salva_campo", function() {
		// salvo/aggiorno campo
		var questo=$(this);
		var id_campo=questo.attr("data-idcampo");		
		var id_azione=questo.parent().parent().children("input[name='id_azione']").val();
		var descrizione=questo.parent().parent().children("td[name='descrizione']").children("input").val();
		var active=questo.parent().parent().children("td[name='active']").children("input:checked").val();
		var id_avvocato=questo.parent().parent().children("td[name='avvocato']").children("select").val();
		id_avvocato = (typeof active=="undefined") ? 0 : id_avvocato;
		var dati="id_azione="+id_azione+"&id_campo="+id_campo+"&descrizione="+descrizione+"&id_avvocato="+id_avvocato;
		if (id_campo=="") {
			// rest save campo
			$.post('<?php echo site_url('azioni/save_campo'); ?>',dati,function(json){
				alert(json);
			});
		}else{
			// rest update campo
			$.post('<?php echo site_url('azioni/update_campo'); ?>',dati,function(json){
				var data = jQuery.parseJSON(json);
				swal({ title: '', text: data.msg, type: data.type, timer: 2000});
			});
		}
		
	});
	
	$("body").on("click", ".cancella_campo", function() {
		// elimino tr campo
		var questo=$(this);
		var id_campo=questo.attr("data-idcampo");
		if (id_campo!="") {
			// query cancella campo
			var dati="id_campo="+id_campo;
			$.post('<?php echo site_url('azioni/delete_campo'); ?>',dati,function(json){
				var data = jQuery.parseJSON(json);
				console.log(data);
				swal({ title: '', text: data.msg, type: data.type, timer: 2000});
				if (data.type=="success") questo.parent().parent().remove();
			});
		}else{
			questo.parent().parent().remove();
			swal({ title: '', text: 'Campo cancellato correttamente', type: 'success', timer: 2000});
		}
	});
</script>
