<?php
if (isset($_GET['page']))
	{
		echo("Page value is " . $_GET['page'] . ".");
	}
else 
	{
		echo("Page is not set.");
	}
?>