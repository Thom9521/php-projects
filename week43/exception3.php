<?php

try {
    //Giving the method an argument will fix the code
    processCC();
}catch (Exception $e){
    // gets first error message
    echo $e->getMessage();
    echo "<br/>";
    // gets the name of the method/class
    echo get_class($e);
    echo "<br/>";
    //gets the previous message if we have multiple error messages
    echo $e->getPrevious()->getMessage();
    echo "<br/>";
    // gets the name of the previous method/class
    echo get_class($e->getPrevious());
}

function processCC($num = null){
    try {
        validate($num);
    } catch (Exception $e){
        throw new BadMethodCallException("Invalid inputs", null, $e);
    }
    echo "Processed";
}

function validate($num){
    if (is_null($num)){
        throw new InvalidArgumentException("No CC number");
    }
}