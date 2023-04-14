<?php
	$totalclientes.='<div class="container">
		<div class="team-two">
			<div class="block-heading-two">
				<h3><span>International</span></h3>
			</div>
			<div class="row">';
				$listaClientesResults = listaClientes($conn,$lang,"2","1","0");
				foreach($listaClientesResults AS $cliente) {
					$totalclientes.='<div class="col-md-6 col-sm-6 col-xs-12">
						<!-- Team #2 member -->
						<div class="team-member rounded-4 br-color padd-15 br-size-1">
							<!-- Image -->
							<div class="col-md-6 col-sm-6 col-xs-12">
								<img class="img-responsive" src="'.$baseURL.'/assets/img/clientes/'.$cliente['imagen'].'" alt="">
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 client-details">
								<h4>'.$cliente['nombre'].'</h4>';
								$totalclientes.=$cliente['descripcion'];
							$totalclientes.='</div>
							<div class="clearfix"></div>
						</div>
					</div>';
				}
				
			$totalclientes.='</div>
		</div>
		
		<div class="team-two">
			<div class="block-heading-two">
				<h3><span>Local</span></h3>
			</div>
			<div class="row">';
				$listaClientesResults = listaClientes($conn,$lang,"1","1","0");
				foreach($listaClientesResults AS $cliente) {
					$totalclientes.='<div class="col-md-6 col-sm-6 col-xs-12">
						<!-- Team #2 member -->
						<div class="team-member rounded-4 br-color padd-15 br-size-1">
							<!-- Image -->
							<div class="col-md-6 col-sm-6 col-xs-12">
								<img class="img-responsive" src="'.$baseURL.'/assets/img/clientes/'.$cliente['imagen'].'" alt="">
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12 client-details">
								<h4>'.$cliente['nombre'].'</h4>';
								$totalclientes.=$cliente['descripcion'];
							$totalclientes.='</div>
							<div class="clearfix"></div>
						</div>
					</div>';
				}
				
			$totalclientes.='</div>
		</div>
	</div>';