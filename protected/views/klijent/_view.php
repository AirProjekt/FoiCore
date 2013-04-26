<?php
/* @var $this KlijentController */
/* @var $data Klijent */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('naziv')); ?>:</b>
	<?php echo CHtml::encode($data->naziv); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adresa')); ?>:</b>
	<?php echo CHtml::encode($data->adresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('OIB')); ?>:</b>
	<?php echo CHtml::encode($data->OIB); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kontakt_osoba')); ?>:</b>
	<?php echo CHtml::encode($data->kontakt_osoba); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefon')); ?>:</b>
	<?php echo CHtml::encode($data->telefon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mobitel')); ?>:</b>
	<?php echo CHtml::encode($data->mobitel); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ostalo')); ?>:</b>
	<?php echo CHtml::encode($data->ostalo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('korisnici_id')); ?>:</b>
	<?php echo CHtml::encode($data->korisnici_id); ?>
	<br />

	*/ ?>

</div>