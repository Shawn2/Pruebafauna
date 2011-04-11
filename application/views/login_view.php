<!--  Contenido -->
<div class='grid_10'> 

<div class='contenido'>

<div class='grid_6 push_1'> <!--  Formulario LOGIN -->
<p>Iniciar sesi&oacute;n</p>
<?php echo validation_errors('<div class="error">','</div>') ?>
<?php echo form_open('login/index') ?>
<?php echo form_label('Usuario: ', 'usuario') ?>
<?php echo form_input(array('name' => 'usuario', 'id' => 'usuario', 'size' => '40', 'value' => set_value('nombre'))) ?>
<?php echo form_label('Contrase&ntilde;a:', 'password'); ?>
<?php echo form_password(array('name' => 'password', 'id' => 'password', 'size' => '40')); ?>
<?php echo form_submit('enviar', 'Login') ?>
<?php echo form_close() ?>
<p><?php echo anchor('', '&#191;Has olvidado tu contrase&ntilde;a? JODETE!')?></p>
</div>

<div class='grid_3'> <!--  Enlaces -->
<p>&#191;Nuevo usuario?</p>
<p><?php echo anchor('registro/index', '&#161;REGISTRATE AQUI!')?></p>
</div>

<div class=clear></div>
</div> 
</div> <!--  Fin Contenido -->

