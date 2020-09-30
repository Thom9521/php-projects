<?php


class Friend extends Person
{
    private $hobby;

    function __construct($name, $hobby){

        //Used to access private $name value from parent, in case we dont want it protected
        parent::__construct($name);

        $this->hobby = $hobby;

    }
    public function showPhone(){
        return $this->phone;

    }

    public function getHobby()
    {
        return $this->hobby;
    }

}