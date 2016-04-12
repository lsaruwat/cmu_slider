<?php
session_start();
include("db/connect.php");

$pageTitle = "concerto";
include("header.php");
?>

<style>
	iframe{
		width: 100%;
		height: 100%;
	}
</style>
<div class="container">
<input type="button" id="getSlide" value="get slide" />
<iframe src="http://concerto.coloradomesa.edu/concerto/screen/index.php?mac=00:00:00:00:0B:AD/"></iframe>
<div id="slide"></div>
<?php

include("footer.php");

?>

</div>
<script type="text/javascript">
window .addEventListener("load", start, false);

function start(){
	document.getElementById("getSlide").addEventListener("click", getConcerotoSlide, false);
	var contents = $("iframe").find("body").attr();
	console.log(contents);
	$("#slide").html(contents);

}

function replaceContent(){
	console.log("Loaded");
	var content = $(this).contents().find( "body" );
	$("#slide").html( content );
	console.log( content );
	$(this).remove();
}

function getConcerotoSlide(){

	$.ajax({
		url : "http://concerto.coloradomesa.edu/concerto/screen/index.php",
		type : 'POST',
		data : {
			mac: "00:00:00:00:0B:AD"
		},

		success : function (returnData) {
			console.log(returnData);
		}

	});
}
</script>