<?php
/* @var $this KorisnikController */
/* @var $model Korisnik */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'korisnik-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ime'); ?>
		<?php echo $form->textField($model,'ime',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'ime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prezime'); ?>
		<?php echo $form->textField($model,'prezime',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'prezime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefon'); ?>
		<?php echo $form->textField($model,'telefon',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'telefon'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kljucne_rijeci'); ?>
		<?php echo $form->textArea($model,'kljucne_rijeci',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'kljucne_rijeci'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tel_ank'); ?>
		<?php echo $form->textField($model,'tel_ank'); ?>
		<?php echo $form->error($model,'tel_ank'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'obav_mail'); ?>
		<?php echo $form->textField($model,'obav_mail'); ?>
		<?php echo $form->error($model,'obav_mail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'korisnici_id'); ?>
		<?php echo $form->textField($model,'korisnici_id'); ?>
		<?php echo $form->error($model,'korisnici_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->