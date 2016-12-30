<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#table_azioni').DataTable({
			"language": {
				"info": "Visualizzati _START_-_END_ di _TOTAL_ risultati",
				"infoEmpty": "Nessun risultato disponibile",
				"infoFiltered": " (filtrando da _MAX_ risultati)",
				"lengthMenu": "Visualizza _MENU_ risultati",
				"search": "Filtra risultati per:",
				"emptyTable": "Nessun risultato",
				"zeroRecords": "Nessun risultato disponibile",
				"paginate": {
					"first": "Prima pagina",
					"last": "Ultima pagina",
					"next": "Pagina precedente",
					"previous": "Pagina successiva"
				}
	        },	       
            responsive: true,
            "columns": [			
				null,
				null,
				null,
				{ "orderable": false },
				{ "orderable": false }
			]
        });
    });
</script>
