<?php
/* @var $this TemaController */
/* @var $model Tema */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tema-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'naziv'); ?>
		<?php echo $form->textField($model,'naziv',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'naziv'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kratki_opis'); ?>
		<?php echo $form->textField($model,'kratki_opis',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'kratki_opis'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dugi_opis'); ?>
		<?php echo $form->textArea($model,'dugi_opis',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'dugi_opis'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->