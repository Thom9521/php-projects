<?php

try {
    processCC();
}catch (Exception $e){
    echo $e->getMessage();
}

function processCC($num = null){
    if (is_null($num)){
        throw new Exception("No CC number");
    }
    echo "Processed";
}