<?php
/* @var $this AnketaController */
/* @var $data Anketa */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('naziv')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->naziv), array('formUnos', 'id'=>$data->id)); ?>
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
        
        <b><?php echo CHtml::encode('Detalji o anketi'); ?>:</b>
        <?php echo CHtml::link(CHtml::encode('Detalji'), array('view', 'id'=>$data->id)); ?>
	<br />


</div>