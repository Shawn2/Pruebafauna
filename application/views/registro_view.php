<!--  Contenido -->
<div class='grid_10'> 

<div class='contenido'>

<p>Rellene los datos:</p>
<?php echo validation_errors('<div class="error">','</div>') ?>
<?php echo form_open('registro/index') ?>
<?php echo form_label('Usuario: ', 'usuario') ?>
<?php echo form_input(array('name' => 'usuario', 'id' => 'usuario', 'size' => '40', 'value' => set_value('usuario'))) ?>
<?php echo form_label('Email:', 'email'); ?>
<?php echo form_input(array('name' => 'email', 'id' => 'email', 'size' => '40', 'value' => set_value('email'))); ?>
<?php echo form_label('Contrase&ntilde;a:', 'password'); ?>
<?php echo form_password(array('name' => 'password', 'id' => 'password', 'size' => '50')); ?>
<?php echo form_label('Reescribe la contrase&ntilde;a:', 'repassword'); ?>
<?php echo form_password(array('name' => 'repassword', 'id' => 'repassword', 'size' => '50')); ?>
<?php echo form_submit('enviar', 'Registrarse') ?>
<?php echo form_close() ?>


<div class=clear></div>
</div> 

</div> <!--  Fin Contenido -->

