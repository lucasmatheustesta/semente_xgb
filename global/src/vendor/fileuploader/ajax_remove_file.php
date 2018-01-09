<?php
if (isset($_POST['file'])) {
    $file = '../../../../img/' . $_POST['file'];
	
    if(file_exists($file))
		unlink($file);
}