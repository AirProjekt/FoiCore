<?php
/* @var $this TemaController */
/* @var $data Tema */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('naziv')); ?>:</b>
	<?php echo CHtml::encode($data->naziv); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kratki_opis')); ?>:</b>
	<?php echo CHtml::encode($data->kratki_opis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dugi_opis')); ?>:</b>
	<?php echo CHtml::encode($data->dugi_opis); ?>
	<br />


</div>