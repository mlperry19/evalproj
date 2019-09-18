<?php
	function postToSession($record)
	{
		print"<h2>Test3</h2>";
		$_SESSION['current'] = $record;
		print"<h2>Test2</h2>";
	}
?>

