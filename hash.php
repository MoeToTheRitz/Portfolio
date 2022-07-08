<?php
Funktion um Hash zu generieren
function generateHash($numberOfLetters,$numberOfIntegers){
   $hash = "";
    // Generiert eine Nummer
   for($i=0;$i <= $numberOfIntegers ;$i++){
    $hash.=random_int(0,9);
    }
    $upperLetters = range("A","Z");
    $lowerLetters = range("a","z");
    //Kombiniert Arrays
    $letters = array_merge($upperLetters,$lowerLetters); 
    
    //Zufällige Buchstaben generieren
    for($i =0; $i<=$numberOfLetters;$i++){
        $max = count($letters);
        $randomIndex = random_int(0,$max);
        $oneChar = $letters[$randomIndex];
        $hash.=$oneChar;
    }
    // Hash vermischen
    $hash = str_shuffle($hash);
    return $hash;
}


