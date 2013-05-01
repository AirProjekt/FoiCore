<div class="row">
        <?php if($pitanje->tip == 1): ?>
            <?php echo $form->textField($modelOdgovori,'naziv');?>
        <?php endif; ?>
        <?php if($pitanje->tip == 2): ?>
            <?php echo $form->textArea($modelOdgovori,'naziv');?>
        <?php endif; ?>
        <?php if($pitanje->tip == 3): ?>
            <?php foreach ($pitanje->odgovoris as $valueOdgovor): ?>
                <?php echo $form->radioButton($valueOdgovor ,'naziv');?>
                <?php echo $valueOdgovor->naziv; ?>
                <br>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if($pitanje->tip == 4): ?>
                
            
                <?php echo $form->checkBoxList($modelOdgovori, 'pitanja_id', Chtml::listData($pitanje->odgovoris, 'id', 'naziv')); ?>
            <?php echo $form->error($modelOdgovori,'pitanja_id'); ?>
            
        <?php endif; ?>
        <?php if($pitanje->tip == 5): ?>
               <?php echo $form->dropDownList($pitanje,'naziv',  CHtml::listData($pitanje->odgovoris, 'id', 'naziv'));?>
        <?php endif; ?>
</div>