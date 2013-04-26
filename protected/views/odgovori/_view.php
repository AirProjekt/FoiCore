<?php
/* @var $this OdgovoriController */
/* @var $data Odgovori */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('naziv')); ?>:</b>
	<?php echo CHtml::encode($data->naziv); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pitanja_id')); ?>:</b>
	<?php echo CHtml::encode($data->pitanja_id); ?>
	<br />


</div>