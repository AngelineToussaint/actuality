<?php

class Upload
{

    public static function uploadFile($file, $size, $extensions) {
        $extensionFile = str_replace('image/', '', $file['type']);

        if ($file['size'] > $size) {
            return false;
        } elseif (!in_array($extensionFile, $extensions)) {
            return false;
        }

        $nameFile = hash('sha1', microtime($file['name'])) .'.'. $extensionFile;

        move_uploaded_file($file['tmp_name'], '../../public/img/upload/' . $nameFile);
        chmod('../../public/img/upload/' . $nameFile, 0755);

        return $nameFile;
    }
}