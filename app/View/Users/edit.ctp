

<div class="row">
	<h3 class="text-center">Agregue un nuevo contacto</h3>
	<div class="col-xs-12 col-sm-10 col-md-8 col-md-push-2 col-sm-push-1">
		<?=$this->Form->create('User', array('role'=>'form'));?>
			<div class="form-group">
				<?=$this->Form->input('id', array('class' => 'form-control', 'type'=>'hidden','label' => 'Apellidos'));?>
				<?=$this->Form->input('name', array('class' => 'form-control', 'label' => 'Nombre(s)'));?>
			</div>
			<div class="form-group">
				<?=$this->Form->input('last_name', array('class' => 'form-control', 'label' => 'Apellidos'));?>
			</div>
			<div class="form-group">
				<?=$this->Form->input('phone', array('class' => 'form-control', 'type'=>'tel','label' => 'Teléfono'));?>		
			</div>
			<div class="form-group">
				<?=$this->Form->input('email', array('class' => 'form-control', 'label' => 'Email'));?>
			</div>
			<div class="form-group">
				<?=$this->Form->input('address', array('class' => 'form-control', 'label' => 'Calle y Número'));?>
			</div>
			<div class="form-group">
				<?=$this->Form->input('suburb', array('class' => 'form-control', 'label' => 'Colonia'));?>

			</div>
			<div class="form-group">
				<?=$this->Form->input('cp', array('class' => 'form-control', 'label' => 'Codigo Postal'));?>
			</div>
			<div class="form-group">
				<?=$this->Form->input('state', array('class' => 'form-control', 'label' => 'Estado'));?>
			</div>
			<div class="form-group">
				<?=$this->Form->input('occupation', array('class' => 'form-control', 'label' => 'Ocupación'));?>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="text-right">
					<?=$this->Html->link('Cancelar',   '/users/',    array('class' => 'btn btn-warning'));?>
					<input type="submit" value="Aceptar" class="btn btn-primary">
					</div>
				</div>
			</div>
		<?=$this->Form->end;?>
	</div>
</div>