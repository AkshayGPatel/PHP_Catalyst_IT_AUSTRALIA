<?php
$i = 1;
$result = "";

for ($i; $i <= 100; $i++) {

    if ($i % 3 == 0) {
        $result .= "foo";
        if ($i % 5 == 0) {
            $result .= "bar";
        }
    } elseif ($i % 5 == 0) {
        $result .= "bar";
    } else {
        $result .= $i;
    }
    $result .= ", ";

}
echo $result;

?>