<?php
/* @var $this PitanjaController */
/* @var $data Pitanja */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('naziv')); ?>:</b>
	<?php echo CHtml::encode($data->naziv); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tip')); ?>:</b>
	<?php echo CHtml::encode($data->tip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('anketa_id')); ?>:</b>
	<?php echo CHtml::encode($data->anketa_id); ?>
	<br />


</div>