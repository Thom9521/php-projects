<?php
function check_email ( $email ) {
    if ( preg_match('/^[a-z\d._-]+@([a-z\d-]+.)+[a-z]{2,6}$/i', $email) == 0 ) {
        echo"You must enter a valid email address";
    }
    else{
        echo "Your mail is $email";
    }
}
check_email("hej-med_dig@hej.dk");