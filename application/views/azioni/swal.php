<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script type="text/javascript">
    <?php if ($this->session->insazione==1) : ?>
		swal({ title: '', text: 'Azione inserita correttamente', type: 'success', timer: 2000});
    <?php endif ?>
    
     <?php if ($this->session->noinsazione==1) : ?>
		swal({ title: '', text: 'Errore inserimento azione', type: 'error', timer: 2000});
     <?php endif ?>
     
     <?php if ($this->session->errornuovaazione!="") : ?>
		swal({ title: '', text: '<?php echo $this->session->errornuovaazione; ?>', type: 'warning', timer: 2500});
     <?php endif ?>
</script>
