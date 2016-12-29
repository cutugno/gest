<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script type="text/javascript">
	$("#update_dettagli_azione").click(function() {
		var dati=$("#form_dettagliazione").serialize();
		$.post('<?php echo site_url('azioni/update'); ?>',dati,function(data){
			alert(data);
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
