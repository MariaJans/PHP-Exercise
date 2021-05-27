<?php
$myarray=Array(
    "MUSICALS" => Array("okahoma","The Music Man","South Pacific"),
    "DRAMAS" => Array("Lawrence of Arabia" ,"To Kill a Mockingbird","Casablanca "),
    "MYSTERIES" => Array("The Maltese Falcon","Rear Window","North by Northwest")
); 
foreach($myarray as $key => $val){
    echo $key . "<br><br>";
    foreach( $val as $keyItem => $valKey){
        echo "- - - -> " . $keyItem . " = " . $valKey . "<br>";
        echo "<br>";
    }
}
echo "<br><br><br>";
krsort($myarray);
foreach($myarray as $key => $val)
{
    echo $key . "<br><br>";
    foreach( $val as $keyItem => $valKey)
    {
        echo "- - - -> " . $keyItem . " = " . $valKey . "<br>";
        echo "<br>";
    }

}

?>