<div class="row">
        <?php if($pitanje->tip == 1): ?>
            <?php echo $form->textField($pitanje,'id');?>
        <?php endif; ?>
        <?php if($pitanje->tip == 2): ?>
            <?php echo $form->textArea($pitanje,'naziv');?>
        <?php endif; ?>
        <?php if($pitanje->tip == 3): ?>
            <?php foreach ($pitanje->odgovoris as $valueOdgovor): ?>
                <?php echo $form->radioButton($valueOdgovor ,'id');?>
                <?php echo $valueOdgovor->naziv; ?>
                <br>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if($pitanje->tip == 4): ?>
            <?php foreach ($pitanje->odgovoris as $valueOdgovor): ?>
                <?php echo $form->checkBox($valueOdgovor,'naziv');?>
                <?php echo $valueOdgovor->naziv; ?>
                <br>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if($pitanje->tip == 5): ?>
               <?php echo $form->dropDownList($pitanje,'naziv',  CHtml::listData($pitanje->odgovoris, 'id', 'naziv'));?>
        <?php endif; ?>
</div>