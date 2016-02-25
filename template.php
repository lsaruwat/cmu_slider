<?php
	include 'db/connect.php';

	function multiexplode ($delimiters,$string) {
    	$ready = str_replace($delimiters, $delimiters[0], $string);
    	$launch = explode($delimiters[0], $ready);
    	return  $launch;
	}

	function getTemplate($templateTextId){
		$sqlStatement = $conn->prepare("SELECT text, templateLocation FROM TemplateText tt INNER JOIN Template te ON tt.templateId = te.templateId WHERE tt.TemplateTextId = :TemplateTextId");

		$sqlStatement->bindParam(":name", $name);
		$sqlStatement->execute();
		$template = $sqlStatement->fetch();
		$dbTemplateResult = $template['templateLocation'];
		$dbTemplateTextResult = $template['text'];
		
		$file = file_get_contents($dbTemplateResult);
		$splitFile = multiexplode( array("{{","}}") , $file);

		$finalHtml = $splitFile[0] . $dbTemplateTextResult . $splitFile[2];
	}

