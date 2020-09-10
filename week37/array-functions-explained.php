<?php
// is_array() checks if an array is an array and returns a bool.

// count() counts all the elements in an array or something in an object, and returns an int.

// sort() sorts an array. This could f.eks. be in alphabetic order or in numeric order.

// shuffle() shuffles an array. It randomizes the order of the elements in the array.

// explode() splits a string by string and turns it into an array.
// example:
$pizza = "piece1 piece2 piece3 piece4";
$pieces = explode(" ", $pizza);
echo $pieces[0]; // output is piece1
echo $pieces[2]; // output is piece3

// extract() imports variables into the current symbol table from an array

// compact() creates an array containing variables and their values

// reset() sets the internal pointer of an array to its first element
//example:
$array = array('step one', 'step two', 'step three', 'step four');
// by default, the pointer is on the first element
echo current($array) . "<br />\n"; // output: step one
// skip two steps
next($array);
next($array);
echo current($array) . "<br />\n"; // output: step three
reset($array); // reset pointer, start again on step one
echo current($array) . "<br />\n"; // output: step one

// end() sets the internal pointer of an array to the last index. the opposite of reset()