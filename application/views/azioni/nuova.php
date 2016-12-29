<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<div id="page-wrapper">           
		<div class="row" style="margin-top: 30px">
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						NUOVA AZIONE
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<?php 
							$attr = array('id' => 'form_createazione');
							echo form_open('azioni/nuova', $attr);
							echo form_hidden('form_name','createazione');
						?>	
						<div class="form-group">
							<label for="c_descr">Descrizione</label>
							<?php
								$data = array(
										'name'          => 'descrizione',
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
					<!-- /.panel-body -->
				</div>
				<!-- /.panel -->
			</div>
			<!-- /.col-lg-6 -->
			
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						IMPORTA AZIONE
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<?php 
							$attr = array('id' => 'form_importaazione');
							echo form_open_multipart('azioni/import', $attr);
							echo form_hidden('form_name','importaazionee');
						?>	
						<div class="form-group">
							<label for="i_descr">Descrizione</label>
							<?php
								$data = array(
										'name'          => 'descrizione',
										'id'            => 'i_descr',
										'class'			=> 'form-control',
										'placeholder'	=> 'Digita una descrizione per l\'azione'
								);
								echo form_input($data);		
							?>
						</div>
						<div class="form-group">
							<label for="i_csv">File .csv</label>
							<?php
								$data = array(
										'name'          => 'i_csv',
										'id'            => 'i_csv',
										'class'			=> 'form-control'
								);
								echo form_upload($data);		
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
					<!-- /.panel-body -->
				</div>
				<!-- /.panel -->
			</div>
			<!-- /.col-lg-6 -->
		</div>
		<!-- /.row -->
	   
	</div>
	<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->