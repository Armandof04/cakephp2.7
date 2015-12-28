<script type="text/javascript">
	var telInput = 1; //contador campo telefono
	var emailInput = 1; //contador campo email
	var maxInputs = 5; //numero permitido maximo de 
	function AddField(field){
		var field;
		//alert(field)
		//return false;
		if(field == 1){
		        telInput++;
				campo = '<div class="form-group"><?=$this->Form->input("phone", array("class" => "form-control",
														 "label" => "Teléfono&nbsp;' + telInput + '",
														 "name" => "data[User][phone' + telInput + ']"));?></div>';
				if(telInput <= maxInputs)
				{	$("#fieldsPhone").append(campo);
					$("#contTel").val(telInput);
				}
				else
					alert('Ha llegado al número maximo de telefonos');	
		}
		else
		{
		        emailInput++;
				campo = '<div class="form-group"><?=$this->Form->input("email", array("class" => "form-control",
														 "label" => "Email&nbsp;' + emailInput + '",
														 "name" => "data[User][email' + emailInput + ']"));?></div>';
				if(emailInput <= maxInputs)
				{
					$("#fieldsEmail").append(campo);
					$("#contEmail").val(emailInput);
				}	
				else
					alert('Ha llegado al número maximo de Email');
		}
	}
</script>

<div class="row">
	<h3 class="text-center">Agregue un nuevo contacto</h3>
	<div class="col-xs-12 col-sm-10 col-md-8 col-md-push-2 col-sm-push-1">
		<?=$this->Form->create('User', array('role'=>'form'));?>
			<div class="form-group">
				<?=$this->Form->input('name', array('class' => 'form-control', 'label' => 'Nombre(s)'));?>
			</div>
			<div class="form-group">
				<?=$this->Form->input('last_name', array('class' => 'form-control', 'label' => 'Apellidos'));?>
			</div>
			<div class="row">
				<div class="form-group">
					<div class="col-md-10">
						<?=$this->Form->input('phone1', array('class' => 'form-control', 'type'=>'tel','label' => 'Teléfono'));?>
						<input type="hidden" value="1" name="data[User][telCont]" id="contTel">
					</div>
					<div class="col-md-2 clearfix">
						<a href="#" onclick="AddField('1');">
						<?=$this->html->image('arrow.png',array('class'=>'img-responsive'));?>
						</a>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div id="fieldsPhone"></div>
			<div class="row">
				<div class="form-group">
					<div class="col-md-10">
						<?=$this->Form->input('email1', array('class' => 'form-control', 'type'=>'email', 'label' => 'Email'));?>
						<input type="hidden" value="1" name="data[User][emailCont]" id="contEmail">
					</div>
					<div class="col-md-2 clearfix">
						<a href="#" onclick="AddField('0');">
						<?=$this->html->image('arrow.png',array('class'=>'img-responsive'));?>
						</a>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div id="fieldsEmail"></div>
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