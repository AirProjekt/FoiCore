<h3>Pitanje</h3>
<li>
    <div class="row">
            <?php echo CHtml::activeLabel($model,"[$index]naziv"); ?>
            <?php echo CHtml::activeTextField($model,"[$index]naziv",array('size'=>60,'maxlength'=>200)); ?>
            <?php echo CHtml::error($model,"[$index]naziv"); ?>
    </div>

    <div class="row">
            <?php echo CHtml::activeLabel($model,"[$index]tip"); ?>
            <?php echo CHtml::activeDropDownList($model,"[$index]tip", $model->getTypes()); ?>
            <?php echo CHtml::error($model,"[$index]tip"); ?>
    </div>
</li>