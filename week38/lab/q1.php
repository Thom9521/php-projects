<?php
// Returns true
// The pattern tells that the subject can contain lowercase letters from a-z and uppercase letters from A-Z
echo preg_match('/[a-zA-Z]+/', "Allan Hansen");

//Returns true
// The subject most start with a letter from a-z or A-Z
echo preg_match('/^[a-zA-Z]+/' , "Ulla Jensen");