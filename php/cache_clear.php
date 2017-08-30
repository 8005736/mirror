<?php

$files = glob("../fenom_cache/*");
$c = count($files);
if (count($files) > 0) {
    foreach ($files as $file) {
        if (file_exists($file)) {
        	unlink($file);
        }
    }
}