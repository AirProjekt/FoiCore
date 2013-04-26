<?php
/* @var $this KorisnikController */
/* @var $model Korisnik */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ime'); ?>
		<?php echo $form->textField($model,'ime',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prezime'); ?>
		<?php echo $form->textField($model,'prezime',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telefon'); ?>
		<?php echo $form->textField($model,'telefon',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kljucne_rijeci'); ?>
		<?php echo $form->textArea($model,'kljucne_rijeci',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tel_ank'); ?>
		<?php echo $form->textField($model,'tel_ank'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'obav_mail'); ?>
		<?php echo $form->textField($model,'obav_mail'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'korisnici_id'); ?>
		<?php echo $form->textField($model,'korisnici_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->