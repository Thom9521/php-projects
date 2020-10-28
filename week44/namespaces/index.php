<?php
require_once 'parrot.php';
require_once 'parrot2.php';

/*
\Yellow\Parrot::talk();
\Green\Parrot::talk();
*/

// we can give the classes aliases so we can call them without backslashes
use \Yellow\Parrot as YellowParrot;
use \Green\Parrot as GreenParrot;
YellowParrot::talk();
GreenParrot::talk();;
