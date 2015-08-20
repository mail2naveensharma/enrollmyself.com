<?php
	$pypath = realpath("./RegisterPy.py");
	exec("python ".$pypath, $output);
	echo implode("", $output);
?>