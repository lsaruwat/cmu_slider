<?php 
$title = $_REQUEST['title'];
$content = $_REQUEST['content'];

if($title === null)$title = "This is a fucking title";
if($content === null)$content = "This is some fucking content for a fucking slide that is broken!!!";

?>
<style type="text/css">

body{
	padding: 0px;
	margin: 0px;
}

.slide_preview, .slide{
	position: relative;
	color: #292929;
	font-weight: 900;
	background-image: url("http://concerto.coloradomesa.edu/concerto/screen/template.php?id=133&time=1457466546280");
	background-size: cover;
	width: 100%;
	min-height: 500px;

}

.slide_preview .content_container, .slide .content_container{
	display: inline-block;
	position: absolute;
	right: 5%;
	bottom: 15%;
	padding: 0px 15px 10px 15px;
	color: #fff;
	text-align: left;
	background-color: rgba(0, 0, 0, .7);
}


</style>
<div class="row slide" id="slide">
	<div class="content_container" id="content_container">
	<h1 class="title_preview"><?php echo $title ?></h1>
	<p class="content_preview"><?php echo $content ?> </p>
	</div>
</div>


<script type="text/javascript">
	var height = window.innerHeight;
	var slide = document.getElementById('slide');
	slide.setAttribute("style", "display: inline-block; height:" + height + "px;");
</script>