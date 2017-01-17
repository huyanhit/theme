<?php
// $zip = new ZipArchive;
function unZip($file){
	$zip = new ZipArchive();
	if ($zip->open($file) === TRUE) {
	    $zip->extractTo('./');
	    $zip->close();
	    echo 'ok';
	} else {
	    echo 'failed';
	}
}

function zip($dir, $zipArchive){
    if (is_dir($dir)) {
        if ($dh = opendir($dir)) {
            $zipArchive->addEmptyDir($dir);
            while (($file = readdir($dh)) !== false) {
                if(!is_file($dir . $file)){
                    if( ($file !== ".") && ($file !== "..")){
                        zip($dir . $file . "/", $zipArchive);
                    }
                }else{
                    $zipArchive->addFile($dir . $file);
                }
            }
            echo 'ok';
        }
    }
}
$zip = new ZipArchive();
$zip->open('./zip.zip', ZipArchive::CREATE); 
zip('./', $zip);
//unZip('zip.zip');
$zip->close();
?>
