<?php

class invalidCCNumberException extends InvalidArgumentException{
    public function __construct($message = "an invalid number exception happen", $code= 0, $previous = null){
        return parent::__construct($message, $code, $previous);
    }
}

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
    // we can also just send a message here
    echo "please provide cc number";


}

function processCC($num = null){
    try {
        validate($num);
    } catch (Exception $e){
        throw $e;
    }
    echo "Processed";
}

function validate($num){
    if (is_null($num)){
        // we can now give it our own message as an argument or use the message from the exception
        throw new invalidCCNumberException();
    }
}