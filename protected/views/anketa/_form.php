<?php if(Yii::app()->user->hasFlash('fail')):?>
        <div class="flash-error"><?php echo Yii::app()->user->getFlash('fail'); ?></div>
<?php endif; ?>

<form name="Anketa" method="POST" action=<?php Yii::app()->getBaseUrl() .'/js/rez.php'?>>
        <h3>Izaberite odgovarajuču temu za anketu:</h3>
        <?php echo CHtml::dropDownList('nazivTeme', '', 
              $model->getThemeNames(),
              array('empty' => '(Odaberi temu)'));?>
	<div id="oanketi">
		<div style='float:left;margin-top:25px;margin-left:25px;width:70%'>
			<div style='float:left;width:100%'><span style='color:#2F4F4F;font-family:Calibri;font-size:17px'>Naziv ankete:</span></div>
			<div style='float:left;width:100%'><input name='naziv_ankete' type='text' class='tf' /></div>
		</div>
	</div>
	

	<div id='pitanja'>
	</div>

	
	<div id="zadnji_izbornik">
		<div style='float:left;width:100px;margin-top:10px;margin-left:10px;margin-right:15px;'><input name="potvrdi" value="Spremi anketu" type="submit"/></div>
		<div style='float:left;width:100px;margin-top:10px;'><input id="dodpit" value="Dodaj pitanje" type="button"/></div>
	</div>	
</form>
