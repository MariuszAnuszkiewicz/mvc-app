<?php

class LoadFile {

   public static function load($file_path) {

       echo $file = file_get_contents($file_path, true);

   } 

}

