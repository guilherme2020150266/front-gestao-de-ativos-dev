<?php 

function unMask($str){

    return preg_replace('/[^0-9]/i', '', $str);

} 

?>