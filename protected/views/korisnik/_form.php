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

	<p class="note">Polja označena zvjezdicom (<span class="required">*</span>) su obavezna.</p>

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
		<?php echo $form->labelEx($model,'tel_ank'); ?>
		<?php echo $form->radioButtonList($model,'tel_ank',array('1'=>'Da','0'=>'Ne')); ?>
		<?php echo $form->error($model,'tel_ank'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'obav_mail'); ?>
		<?php echo $form->radioButtonList($model,'obav_mail',array('1'=>'Da','0'=>'Ne')); ?>
		<?php echo $form->error($model,'obav_mail'); ?>
	</div>
        
        <div class="row">
                <?php echo $form->labelEx($modelKorisnici,'email'); ?>
                <?php echo $form->textField($modelKorisnici, 'email') ?>
                <?php echo $form->error($modelKorisnici,'email'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($modelKorisnici,'lozinka'); ?>
            <?php echo $form->passwordField($modelKorisnici,'lozinka',array('size'=>20,'maxlength'=>255)); ?>
            <?php echo $form->error($modelKorisnici,'lozinka'); ?>
        </div>
        
        
        <div class="row">
            <?php echo $form->labelEx($modelKorisnici,'lozinka_repeat'); ?>
            <?php echo $form->passwordField($modelKorisnici,'lozinka_repeat',array('size'=>20,'maxlength'=>255)); ?>
            <?php echo $form->error($modelKorisnici,'lozinka_repeat'); ?>
        </div>

	<div class="row">
		<?php //echo $form->labelEx($model,'korisnici_id'); ?>
		<?php //echo $form->textField($model,'korisnici_id'); ?>
		<?php //echo $form->error($model,'korisnici_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Pošalji' : 'Save'); ?>
	</div>
        
        

<?php $this->endWidget(); ?>
        
<?php if(Yii::app()->user->hasFlash('success')):?>
        <div class="successMessage"><?php echo Yii::app()->user->getFlash('success'); ?></div>
<?php endif; ?>
<?php if(Yii::app()->user->hasFlash('uspjesanUpdate')):?>
        <div class="successMessage"><?php echo Yii::app()->user->getFlash('uspjesanUpdate'); ?></div>
<?php endif; ?>

</div><!-- form -->