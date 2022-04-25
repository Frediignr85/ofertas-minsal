
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"
		aria-hidden="true">&times;</button>
	<h4 class="modal-title"><?php echo $nombre_establecimiento; ?></h4>
</div>
<div class="modal-body">
	<div class="wrapper wrapper-content  animated fadeInRight">
		<div class="row" id="row1">
			<?php
				//permiso del script
			?>
			<div class="col-lg-12">
                <?php if ($imagen_banner!="") { ?>
                <!--Widgwt imagen-->
                <div class="col-lg-12 center-block">
                    <div class="widget style1 gray-bg text-center">
                    <div class="m-b-md" id='imagen'>
                        <img alt="image" class="img-rounded" src=<?php echo "http://localhost/promociones/assets/".$imagen_banner; ?> width="100%" height="150px" border='1'>
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
							<th>Sucursal</th>
							<th><?php echo $nombre; ?></th>
						</tr>
                        <tr>
							<th>Direccion</th>
							<th><?php echo $direccion; ?></th>
						</tr>
                        <tr>
							<th>Departamento</th>
							<th><?php echo $nombre_departamento; ?></th>
						</tr>
                        <tr>
							<th>Municipio</th>
							<th><?php echo $nombre_municipio; ?></th>
						</tr>
                        <tr>
							<th>URL MAPS</th>
							<th><a href="<?php echo $url; ?>" target="_blank">Direccion al maps</a></th>
						</tr>
                        <tr>
							<th>Telefono</th>
							<th><?php echo $telefono; ?></th>
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

