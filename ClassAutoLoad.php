<?php
date_default_timezone_set("Africa/Nairobi");

spl_autoload_register('ClassAutoLoad', true, true);
function ClassAutoLoad($class){

    $directories = array("layout","processes");
    foreach($directories as $dir){
        $filename =  dirname(__FILE__).DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR. $class . ".php";

        if (is_readable($filename)){
            include $filename;
        }
    }

}



$OBJ_Layout = new Layout();
$OBJ_processes = new processes();
?>
