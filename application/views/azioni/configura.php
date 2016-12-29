<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<div id="page-wrapper">           
		<div class="row" style="padding-top: 30px">
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						DETTAGLI AZIONE
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<?php 
							$attr = array('id' => 'form_dettagliazione');
							echo form_open('#', $attr);
							echo form_hidden('id', $azione->id);
						?>	
						<div class="form-group">
							<label for="a_descr">Descrizione</label>
							<?php
								$data = array(
										'name'          => 'descrizione',
										'id'            => 'a_descr',
										'class'			=> 'form-control',
										'value'	=> isset($azione->descrizione) ? $azione->descrizione : set_value('a_descr')
								);
								echo form_input($data);				
							?>
						</div>
						<div class="form-group checkbox">
							<label for="a_active">
							<?php
								$data = array(
										'name'          => 'active',
										'id'            => 'a_active',
										'value'			=> '1',
										'checked'       => $azione->active
								);

								echo form_checkbox($data);	
							?>
								<strong>Attiva</strong>
							</label>
						</div>	
						<label>Creata il: </label> <span id="a_date_create"><?php echo $azione->date_create; ?></span><br />	
						<label>Ultima modifica: </label> <span id="a_date_edit"><?php echo $azione->date_edit; ?></span><br />	
						<?php
							$data = array(
									'type'          => 'button',
									'content'       => '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> AGGIORNA DETTAGLI',
									'class'			=> 'btn btn-success',
									'id'			=> 'update_dettagli_azione'
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
			<div class="col-lg-6 text-right">
				<a href="<?php echo site_url('azioni'); ?>"><button class="btn btn-default"><i class="fa fa-th-list"></i> Elenco azioni</button></a>
			</div>
			<!-- /.col-lg-6 -->
		</div>
		<!-- /.row -->
	   <div class="row">
			<div class="col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						CAMPI AZIONE
						<div class="pull-right">
							<button type="button" class="btn btn-info btn-xs dropdown-toggle"><i class="fa fa-plus-circle"></i> Aggiungi campo</button>
						</div>
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<table width="100%" class="table table-striped table-hover table-bordered" id="table_campi">
							<thead>
								<tr>
									<th>Descrizione</th>
									<th>Editabile</th>
									<th style="width:370px">Avvocato</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($campi as $campo) : ?>
								<?php 
									$attr = array('class' => 'form_dettaglicampo');
									echo form_open('#', $attr);
								?>	
								<tr>
										<td>
											<?php
												$data = array(
														'name'          => 'campo_descrizione[]',
														'class'			=> 'form-control',
														'value'	=> isset($campo->descrizione) ? $campo->descrizione : set_value('campo_descrizione[]')
												);
												echo form_input($data);				
											?>
										</td>                      
										<td>
											<?php
												$data = array(
														'name'          => 'a_active',
														'class'            => 'a_active',
														'value'			=> '1',
														'checked'       => $campo->editabile
												);

												echo form_checkbox($data);	
											?>
										</td>                      
										<td id="<?php echo $campo->editabile; ?>">
											<?php 
											$attr="class=\"a_avvocato form-control\" data-idavv=\"".$campo->editabile."\" style=\"width:350px; display:".$campo->display_editabile."\"";
											echo form_dropdown('a_avvocato',$selectavvocati,$campo->editabile,$attr); 
										?>
										</td>  
										<td class="text-center">
											<?php
												$data = array(
														'type'          => 'button',
														'content'       => '<i class="fa fa-pencil-square-o" aria-hidden="true"></i> AGGIORNA CAMPO',
														'class'			=> 'btn btn-success aggiorna_campo',
														'data-idcampo'	=> $campo->id
												);
												echo form_button($data);	
											?>									

											<?php
												$data = array(
														'type'          => 'button',
														'content'       => '<i class="fa fa-trash-o" aria-hidden="true"></i> ELIMINA CAMPO',
														'class'			=> 'btn btn-danger elimina_campo',
														'data-idcampo'	=> $campo->id
												);
												echo form_button($data);	
											?>										
										</td>                    
								</tr>
								<?php echo form_close(); ?>
								<?php endforeach; ?>                             
							</tbody>
						</table>                            
					</div>
					<!-- /.panel-body -->
				</div>
				<!-- /.panel -->
			</div>
			<!-- /.col-xs-12 -->
	   </div>
	   <!-- /.row -->
	</div>
	<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->