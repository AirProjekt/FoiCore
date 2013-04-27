
<?php
$vrj=$_POST["vrij"];
$ptbr=$_POST["pitbr"];
if(isset($_POST["dd"]))$dd=$_POST["dd"];
else $dd=-1;

$tip="";
if($vrj==3)$tip="radio";
else if($vrj==4)$tip="checkbox";
else if($vrj==5)$tip="prazno";

if($vrj>2){  // glavni IF


 if($dd==-1){
		echo "<div style='float:left:width:100%;margin-top:6px;margin-left:15px;'>";

			if($tip!="prazno")echo "<div style='float:left;width:25px;margin-right:8px;margin-top:7px;margin-bottom:6px'><input name='odgovor_radio_grupa".$ptbr."' class='prmod' name='prmod' type='".$tip."'/></div>";
			else echo "<div style='float:left;width:25px;margin-right:8px'>&nbsp;</div>";
			echo "<div style='float:left;width:350px;margin-right:8px;margin-bottom:6px'><input type='text' class='tf' name='odgo_".$ptbr."_1'/></div>";
		echo "</div>";
		echo "<div style='float:left;width:100%;height:6px'>&nbsp;</div>";
		echo "<div style='float:left:width:100%;margin-top:6px;margin-left:15px;'>";
			if($tip!="prazno")echo "<div style='float:left;width:25px;margin-right:8px;margin-top:7px;margin-bottom:6px'><input name='odgovor_radio_grupa".$ptbr."' class='prmod' name='prmod' type='".$tip."'/></div>";
			else echo "<div style='float:left;width:25px;margin-right:8px'>&nbsp;</div>";

			echo "<div style='float:left;width:350px;margin-right:8px;margin-bottom:6px'><input type='text' class='tf' name='odgo_".$ptbr."_2'/></div>";
		echo "</div>";
		echo "<div style='float:left;width:100%;height:6px'>&nbsp;</div>";

		echo "<div id='kutija_dod_odgovori".$ptbr."' style='float:left;width:100%;'>";
		echo "</div>";

		echo "<div style='float:left;width:100%;margin-bottom:6px;'>";
			echo "<div style='float:left;width:50%;margin-left:48px'><input class='dododgovor' tip_inputa='".$vrj."' broj_pit='1' pitbr='".$ptbr."' type='button' style='width:130px;height:28px' value='Dodaj odgovor'/>";
		echo "</div>";
	}

	else if($dd==1){
		echo "<div id='kutija_odgovor".$ptbr.$_POST["odg_id"]."' style='float:left:width:100%;margin-top:6px;margin-left:15px;'>";
			if($tip!="prazno")echo "<div style='float:left;width:25px;margin-right:8px;margin-top:7px;margin-bottom:6px'><input name='odgovor_radio_grupa".$ptbr."' class='prmod' name='prmod' type='".$tip."'/></div>";
			else echo "<div style='float:left;width:25px;margin-right:8px'>&nbsp;</div>";
			echo "<div style='float:left;width:350px;margin-right:8px;margin-bottom:6px'><input type='text' class='tf' name='odgo_".$ptbr."_".($_POST["odg_id"]+2)."'/></div>";
			echo "<div style='float:left;width:40px;margin-left:4px;margin-bottom:6px'><input class='izbrodgovor' pitbr='".$ptbr."' oid='".$_POST["odg_id"]."' style='width:28px;height:28px' type='button' value='X'/></div>";
		
		echo "<div style='float:left;width:100%;height:6px;'>&nbsp;</div>";
		echo "</div>";	
	}
	
}  // kraj glvnog IF-a
?>