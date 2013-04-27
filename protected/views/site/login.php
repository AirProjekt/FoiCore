<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>Prijava</h1>

<p>Ispunite sljedeća polja sa svojim korisničkim podacima:</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lozinka'); ?>
		<?php echo $form->passwordField($model,'lozinka'); ?>
		<?php echo $form->error($model,'lozinka'); ?>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'zapamtiMe'); ?>
		<?php echo $form->label($model,'zapamtiMe'); ?>
		<?php echo $form->error($model,'zapamtiMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Prijava'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
