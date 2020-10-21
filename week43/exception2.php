<?php

try {
    //Giving the method an argument will fix the code
    processCC();
}catch (Exception $e){
    // gets first error message
    echo $e->getMessage();
    echo "<br/>";
    //gets the previous message if we have multiple error messages
    echo $e->getPrevious()->getMessage();
}

function processCC($num = null){
    try {
        validate($num);
    } catch (Exception $e){
        throw new Exception("Invalid inputs", null, $e);
    }
    echo "Processed";
}

function validate($num){
    if (is_null($num)){
        throw new Exception("No CC number");
    }
}