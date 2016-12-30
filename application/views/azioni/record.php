<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<div id="page-wrapper">           
		<div class="row" style="padding-top: 30px">
			<div class="col-xs-10">
				<h1><?php echo $azione->descrizione; ?></h1>
			</div>
			<!-- /.col-xs-10 -->
			<div class="col-xs-2 text-right">
				<a href="<?php echo site_url('azioni'); ?>"><button class="btn btn-default"><i class="fa fa-th-list"></i> Elenco azioni</button></a>
			</div>
			<!-- /.col-xs-2 -->
		</div>
		<!-- /.row -->		
	   <div class="row">
			<div class="col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						RECORD AZIONE
						<div class="pull-right">
							<button type="button" class="btn btn-info btn-xs" id="aggiungi_record"><i class="fa fa-plus-circle"></i> Aggiungi record</button>
						</div>
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<table width="100%" class="table table-striped table-bordered" id="table_record">
							<thead>
								<tr>									
									<?php foreach ($campi as $campo) : ?>
									<th><?php echo $campo->descrizione; ?></th>
									<?php endforeach ?>
								</tr>
							</thead>
							<tbody>								
								<?php var_dump ($campi); ?>   
								<?php foreach ($campi as $val) : ?>
								<tr>
									<?php for ($x=0;$x<count($val->record);$x++) : ?>
									<td>
										<?php var_dump ($val->record[$x]); ?>
									</td>
									<?php endfor ?>
								</tr>        
								<?php endforeach ?>
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
