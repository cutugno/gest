<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<h3>Elenco azioni</h3>
			<table id="azioni_table" class="table table-condensed table-hover">
				<thead>
						<tr>
								<th>Descrizione</th>
								<th>Creato il</th>
								<th>Ultima modifica</th>
								<th></th>
						</tr>
				</thead>
				<tbody>
						<?php foreach($azioni as $azione) : ?>
						<tr>
								<td><?php echo $azione->descr; ?></td>                      
								<td><?php echo $azione->date_create; ?></td>                      
								<td><?php echo $azione->date_edit; ?></td>  
								<td><a href="<?php echo site_url('azioni/campi/'.$azione->id); ?>">
									<?php
										$data = array(
												'type'          => 'button',
												'content'       => '<i class="fa fa-search" aria-hidden="true"></i> DETTAGLI CAMPI',
												'class'			=> 'btn btn-info btn-xs'
										);
										echo form_button($data);	
									?>	
									</a>									
									<a href="<?php echo site_url('azioni/record/'.$azione->id); ?>">
									<?php
										$data = array(
												'type'          => 'button',
												'content'       => '<i class="fa fa-trash-o" aria-hidden="true"></i> DETTAGLI RECORD',
												'class'			=> 'btn btn-warning btn-xs'
										);
										echo form_button($data);	
									?>	
									</a>									
								</td>                    
						</tr>
						<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<div class="col-md-5">
			<h3>Nuova azione</h1>
			<?php 
				$attr = array('id' => 'form_createazione');
				echo form_open('azioni/create', $attr);
			?>	
			<div class="form-group">
				<label for="c_descr">Descrizione</label>
				<?php
					$data = array(
							'name'          => 'c_descr',
							'id'            => 'c_descr',
							'class'			=> 'form-control',
							'placeholder'	=> 'Digita una descrizione per l\'azione'
					);
					echo form_input($data);				
				?>
			</div>
			<?php
				$data = array(
						'type'          => 'submit',
						'content'       => '<i class="fa fa-floppy-o" aria-hidden="true"></i> CREA AZIONE',
						'class'			=> 'btn btn-primary'
				);
				echo form_button($data);				
				echo form_close();
			?>
		</div>
		<div class="col-md-5 col-md-offset-2">
			<h3>Importa azione da .csv</h3>
			<?php 
				$attr = array('id' => 'form_inportazione');
				echo form_open('azioni/import', $attr);
			?>	
			<div class="form-group">
				<label for="descr">Descrizione</label>
				<?php
					$data = array(
							'name'          => 'i_descr',
							'id'            => 'i_descr',
							'class'			=> 'form-control',
							'placeholder'	=> 'Digita una descrizione per l\'azione'
					);
					echo form_input($data);		
				?>
			</div>
			<div class="form-group">
				<label for="descr">Descrizione</label>
				<?php
					$data = array(
							'name'          => 'i_csv',
							'id'            => 'i_csv',
							'class'			=> 'form-control'
					);
					echo form_upload($data);		
				?>
			</div>
			
			
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
