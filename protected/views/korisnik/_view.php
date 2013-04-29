<?php
/* @var $this KorisnikController */
/* @var $data Korisnik */
?>

<div class="view">
<?php
/*	<b> echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />
 */
 ?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('ime')); ?>:</b>
	<?php echo CHtml::encode($data->ime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prezime')); ?>:</b>
	<?php echo CHtml::encode($data->prezime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefon')); ?>:</b>
	<?php echo CHtml::encode($data->telefon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kljucne_rijeci')); ?>:</b>
	<?php echo CHtml::encode($data->kljucne_rijeci); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tel_ank')); ?>:</b>
	<?php echo (CHtml::encode($data->tel_ank)==="1") ? 'da' : 'ne'; ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('obav_mail')); ?>:</b>
	<?php echo (CHtml::encode($data->obav_mail)==="1") ? 'da' : 'ne'; ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('korisnici_id')); ?>:</b>
	<?php echo CHtml::encode($data->korisnici_id); ?>
	<br />

	*/ ?>

</div>