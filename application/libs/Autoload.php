<?php
    spl_autoload_register(function ($path) {
        print $path. "<br>";
        $path = str_replace('\\','/',$path);
        // print $path. "<br>";
        $paths = explode('/', $path);
        print $paths[0]. "<br>";
        
        if (preg_match('/model/', strtolower($paths[1]))) {
            $className = 'models';
        } else if (preg_match('/controller/',strtolower($paths[1]))) {
            $className = 'controllers';
        } else {
            $className = 'libs';
        }

        $loadpath = $paths[0].'/'.$className.'/'.$paths[2].'.php';
        
       // echo 'autoload $path : ' . $loadpath . '<br>';
        
        if (!file_exists($loadpath)) {
            echo " --- autoload : file not found. ($loadpath) ";
            exit();
        }
        require_once $loadpath;
    });
