<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script type="text/javascript">
	
	// tablesorter
	$("#azioni_table").tablesorter({
		widthFixed: true, 
		widgets: ["filter"],
		headers: {
			'.noorder': {
				sorter:false
			}
		}
	}); 

</script>
