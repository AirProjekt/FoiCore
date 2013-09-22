<div class="row">
    <?php if ($vrsta == 2): ?>
        <?php echo CHtml::radioButton('radio',array('disabled')); ?>
        <?php echo CHtml::activeTextField($model,"[$index]naziv",array('size'=>60,'maxlength'=>250)); ?>
        <?php echo CHtml::error($model,"[$index]naziv"); ?>
    <?php endif; ?>
    <?php if ($vrsta == 3): ?>
        <?php echo CHtml::checkBox('check',array('disabled')); ?>
        <?php echo CHtml::activeTextField($model,"[$index]naziv",array('size'=>60,'maxlength'=>250)); ?>
        <?php echo CHtml::error($model,"[$index]naziv"); ?>
    <?php endif; ?>
    <?php if ($vrsta == 4): ?>
        <?php echo CHtml::activeTextField($model,"[$index]naziv",array('size'=>60,'maxlength'=>250)); ?>
        <?php echo CHtml::error($model,"[$index]naziv"); ?>
    <?php endif; ?>
</div>