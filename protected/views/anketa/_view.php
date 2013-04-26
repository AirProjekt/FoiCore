<?php
/* @var $this AnketaController */
/* @var $data Anketa */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('naziv')); ?>:</b>
	<?php echo CHtml::encode($data->naziv); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('datum')); ?>:</b>
	<?php echo CHtml::encode($data->datum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tema_id')); ?>:</b>
	<?php echo CHtml::encode($data->tema_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('klijent_id')); ?>:</b>
	<?php echo CHtml::encode($data->klijent_id); ?>
	<br />


</div>