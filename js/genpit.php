<?php
$ptbr=$_POST["pitbr"];

echo("
	<div id='pitanje".$ptbr."' pitbr='".$ptbr."' class='pitanje_neparno'>
		<div style='float:left;width:70%;margin-left:25px;margin-top:10px'><span style='color:#222222;font-size:18px;font-family:Calibri'>Naslov pitanja:</span></div>");

		
if($ptbr>1){
		echo "<div style='float:right;width:10%;margin-right:8px;margin-top:10px'><input class='izbrpit' id='rmvpit".$ptbr."' pitbr='".$ptbr."' style='width:28px;height:28px;' type='button' value='X'/></div>";
}
echo("
		<div style='float:left;width:70%;margin-left:25px;margin-top:10px'><input name='pit_nas".$ptbr."' pitbr='".$ptbr."' type='text' class='tf'/></div>
		<div style='float:left;width:70%;margin-left:25px;margin-top:10px'><span style='color:#222222;font-size:18px;font-family:Calibri'>Tip pitanja:</span></div>
		<div style='float:left;width:70%;margin-left:25px;margin-top:10px'>
				<select class='pttipcb' name='pit_tip".$ptbr."' pitbr='".$ptbr."' class='sel'>
					<option selected='selected' value='1'>Jednostavni unos</option>
					<option value='2'>Složeni unos</option>
					<option value='3'>Jednostruki unos</option>
					<option value='4'>Visestruki izbor</option>
					<option value='5'>Izbor iz liste</option>
				</select>
		</div>

		<div class='izbori_pitanja' id='izbori_pitanja".$ptbr."' pitbr='".$ptbr."'>
			
		</div>
	</div>
");
?>

