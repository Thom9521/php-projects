<?php

// The pattern tells that the subject should contain one or more numbers
echo preg_match ( '/[0-9]+/' , "aa38AA" );

echo "<br />";

// The pattern tells that the subject should start with one or more numbers
echo preg_match ( '/^[0-9]+/' , "3aa38AA" );

echo "<br />";
