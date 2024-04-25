<?php

function hashData($password , $method = "sha1"){
    switch ($method){
        case "crc32" : return crc32($password);
        case "md5" : return md5($password);
        case "sha1" : return sha1($password);
    }
    return $password;
}
