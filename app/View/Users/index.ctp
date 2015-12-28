
<div class="row">
<div class="col-md-6 col-md-offset-6"><?=$this->Session->flash();?></div>

</div>
<h3 class="text-center">Agenda Personal</h3>

	<div class="row">
	<div class="clearfix"></div>
		<div class="col-md-12">
			<table class="table table-hover">
				<tr>
					<th>Nombre</th>
					<th>Apellidos</th>
					<th>Teléfono(s)</th>
					<th>Email(s)</th>
					<th>Calle</th>
					<th>Colonia</th>
					<th>CP</th>
					<th>Estado</th>
					<th>Ocupación</th>
					<th>Acciones</th>
				</tr>
			<?php
				foreach ($users as $k => $user) {
					echo '<tr>';
					echo '<td>'.$user['User']['name'].'</td>';
					echo '<td>'.$user['User']['last_name'].'</td>';
					echo '<td>'.$user['User']['phone'].'</td>';
					echo '<td>'.$user['User']['email'].'</td>';
					echo '<td>'.$user['User']['address'].'</td>';
					echo '<td>'.$user['User']['suburb'].'</td>';
					echo '<td>'.$user['User']['cp'].'</td>';
					echo '<td>'.$user['User']['state'].'</td>';
					echo '<td>'.$user['User']['occupation'].'</td>';
					echo '<td>';
					echo $this->Html->link('Editar', array('action'=>'edit', $user['User']['id'])).' / ';
					echo $this->Form->postLink('Eliminar', 
								array('action' => 'delete', $user['User']['id']),
								array('confirm' => '¿Desea borrar el contacto '.$user['User']['name'].' '.$user['User']['last_name'].'?' )
									);
							
					echo '</td>';
					echo '</tr>';
				}
			?>
			</table>
		</div>
</div>



	

