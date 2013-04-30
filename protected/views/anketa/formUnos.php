<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'odgovori-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        <h3>Tema - <?php echo $model->tema->naziv ?></h3>
        <h3><?php echo $model->naziv ?></h3>

        <div class="row">
            <?php foreach ($model->pitanjas as $value): ?>
                <h3><?php echo $value->naziv ?></h3>
                <div class="row">
                    <?php $this->renderPartial('../odgovori/_form',array('pitanje'=>$value,'form'=>$form)) ?>
                </div>
                <br>
            <?php endforeach; ?>
        </div>
        

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->


