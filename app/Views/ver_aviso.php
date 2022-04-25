
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"
		aria-hidden="true">&times;</button>
	<h4 class="modal-title"><?php echo $nombre_tipo_aviso; ?></h4>
</div>
<div class="modal-body">
	<div class="wrapper wrapper-content  animated fadeInRight">
		<div class="row" id="row1">
			<?php
				//permiso del script
			?>
			<div class="col-lg-12">
                <?php if ($imagen_aviso!="") { ?>
                <!--Widgwt imagen-->
                <div class="col-lg-12 center-block">
                    <div class="widget style1 gray-bg text-center">
                    <div class="m-b-md" id='imagen'>
                        <img alt="image" class="img-rounded" src="http://localhost/promociones/assets/<?php echo $imagen_aviso; ?>" width="100%"  border='1'>
                    </div>
                    </div>
                </div>
                <!--Fin Widgwt imagen-->
                <?php }
                ?>
            </div>
			<div class="col-lg-12" style="margin-top: 50px;">
				<table class="table table-bordered table-striped" id="tableview">
					<tbody>	
                        <tr>
							<th><?php echo $nombre; ?></th>
						</tr>
                        <tr>
							<th><?php echo $descripcion; ?></th>
						</tr>
                    </tbody>		
				</table>
			</div>
		</div>
		</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
</div>

