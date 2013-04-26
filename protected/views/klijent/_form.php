<?php
/* @var $this KlijentController */
/* @var $model Klijent */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'klijent-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'naziv'); ?>
		<?php echo $form->textField($model,'naziv',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'naziv'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'adresa'); ?>
		<?php echo $form->textField($model,'adresa',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'adresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'OIB'); ?>
		<?php echo $form->textField($model,'OIB',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'OIB'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kontakt_osoba'); ?>
		<?php echo $form->textField($model,'kontakt_osoba',array('size'=>60,'maxlength'=>70)); ?>
		<?php echo $form->error($model,'kontakt_osoba'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefon'); ?>
		<?php echo $form->textField($model,'telefon',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'telefon'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobitel'); ?>
		<?php echo $form->textField($model,'mobitel',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'mobitel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ostalo'); ?>
		<?php echo $form->textArea($model,'ostalo',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'ostalo'); ?>
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