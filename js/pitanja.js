
$(document).ready(function(){

var pitanje=1;


$.ajax({
	url:'js/genpit.php',
	type:'POST',
	data:{"pitbr":pitanje},
	success:function(data){
		$("#pitanja").html(data);
		$("#pitanje1").css("display","block");
	}
});

pitanje++;


$("#pitanja").on("click",".pitanje_neparno",function(){	
	$("#rmvpit"+$(this).attr("pitbr")).css("display","block");
});



$("#pitanja").on(
{
    mouseenter: function() 
    {
        $("#rmvpit"+$(this).attr("pitbr")).css("display","block");
    },
    mouseleave: function()
    {
        $("#rmvpit"+$(this).attr("pitbr")).css("display","none");
    }
},".pitanje_neparno");




		




$("#dodpit").click(function(){
	$.ajax({
		url:'js/genpit.php',
		type:'POST',
		data:{"pitbr":pitanje},
		success:function(data){
			$("#pitanja").append(data);
			$("#pitanje"+(pitanje-1)).fadeIn(1500);
			$("html,body").animate({ scrollTop: $(document).height()}, 1000);
		}
	});
	pitanje++;

});  // kraj dodpit



$("#pitanja").on("click",".izbrpit",function(){
	var pitid="#pitanje"+$(this).attr("pitbr");
	$("#pitanja "+pitid).remove(); 
	$("html,body").animate({ scrollTop: $(document).height()}, 1000);
}); // kraj definiranje brisanja pitanja



$("#pitanja").on("change",".pttipcb",function(){
	var ptb=$(this).attr("pitbr");
	$.ajax({
		url:'js/genizbore.php',
		type:'POST',
		data:{"vrij":$(this).val(),"pitbr":ptb},
		success:function(data){
			var tt="#izbori_pitanja"+ptb;
			$(tt).html(data);
		}
	});
});

// Primjerni radioboxovi/checkboxovi

$("#pitanja").on("click",".prmod",function(){
	$(this).removeAttr("checked");
});



/*
     Dodavanje i brisanje odogovora
*/

$("#pitanja").on("click",".dododgovor",function(){
	var ptb=$(this).attr("pitbr");
	var broj_pit=parseInt($(this).attr("broj_pit"));
	$(this).attr("broj_pit",broj_pit+1);
	$.ajax({
		url:'js/genizbore.php',
		type:'POST',
		data:{"vrij":$(this).attr("tip_inputa"),"pitbr":ptb,"dd":1,"odg_id":broj_pit},
		success:function(data){
			var tt="#kutija_dod_odgovori"+ptb;
			$(tt).append(data);
		}
	});
});


$("#pitanja").on("click",".izbrodgovor",function(){
	var brc=$(this).attr("pitbr");
	var oid=$(this).attr("oid")
	var pitid="#kutija_odgovor"+brc+oid;
	$("#pitanja "+pitid).remove();
});


}); // kraj dokumenta