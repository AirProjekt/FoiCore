<form name="Anketa" method="POST" action='rez.php'> 
	<div id="oanketi">
		<div style='float:left;margin-top:25px;margin-left:25px;width:70%'>
			<div style='float:left;width:100%'><span style='color:#2F4F4F;font-family:Calibri;font-size:17px'>Naziv ankete:</span></div>
			<div style='float:left;width:100%'><input name='naziv_ankete' type='text' class='tf' /></div>
			<div style='float:left;width:100%;height:10px'>&nbsp;</div>
			<div style='float:left;width:100%'><span style='color:#2F4F4F;font-family:Calibri;font-size:17px'>Opis ankete:</span></div>
			<div style='float:left;width:100%'><textarea name='opis_ankete' class='ta'></textarea></div>
			<div style='float:left;width:100%;height:10px'>&nbsp;</div>
		</div>
	</div>
	

	<div id='pitanja'>
	</div>

	
	<div id="zadnji_izbornik">
		<div style='float:left;width:100px;margin-top:10px;margin-left:10px;margin-right:15px;'><input name="potvrdi" value="Spremi anketu" type="submit"/></div>
		<div style='float:left;width:100px;margin-top:10px;'><input id="dodpit" value="Dodaj pitanje" type="button"/></div>
	</div>	
</form>
