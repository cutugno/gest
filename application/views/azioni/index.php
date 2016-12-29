<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<div id="page-wrapper">           
		<div class="row" style="padding-top: 30px">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						ELENCO AZIONI
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<table width="100%" class="table table-striped table-bordered table-hover" id="table_azioni">
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
										<td><?php echo $azione->descrizione; ?></td>                      
										<td><?php echo $azione->date_create; ?></td>                      
										<td><?php echo $azione->date_edit; ?></td>  
										<td class="text-center"><a href="<?php echo site_url('azioni/configura/'.$azione->id); ?>">
											<?php
												$data = array(
														'type'          => 'button',
														'content'       => '<i class="fa fa-wrench" aria-hidden="true"></i> CONFIGURA',
														'class'			=> 'btn btn-info btn-sm'
												);
												echo form_button($data);	
											?>	
											</a>	
											
											<?php if ($azione->campi > 0) : ?>								
											<a href="<?php echo site_url('azioni/record/'.$azione->id); ?>">
											<?php
												$data = array(
														'type'          => 'button',
														'content'       => '<i class="fa fa-database" aria-hidden="true"></i> RECORD',
														'class'			=> 'btn btn-warning btn-sm'
												);
												echo form_button($data);	
											?>	
											</a>
											<?php endif ?>	
																			
										</td>                    
								</tr>
								<?php endforeach; ?>                             
							</tbody>
						</table>                            
					</div>
					<!-- /.panel-body -->
				</div>
				<!-- /.panel -->
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
	   
	</div>
	<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->