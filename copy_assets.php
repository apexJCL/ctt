<?php
/**
 * Created by IntelliJ IDEA.
 * User: zero_
 * Date: 06/10/2016
 * Time: 09:54 PM
 */

function copy_directory($src, $dst)
{
    $dir = opendir($src);
    @mkdir($dst);
    while (false !== ($file = readdir($dir))) {
        if (($file != '.') && ($file != '..')) {
            if (is_dir($src . '/' . $file)) {
                copy_directory($src . '/' . $file, $dst . '/' . $file);
            } else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}

// Copy bootstrap assets for custom compilation
copy_directory('vendor/bower/bootstrap-sass/assets', 'frontend/custom_libs/bootstrap');
// Copy MaterializeCSS for custom compilation
copy_directory('vendor/bower/materialize/', 'frontend/custom_libs/materialize/');