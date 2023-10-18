<?php


$M  = array("500", "200", "100","50", "20", "10", "5", "2", "1", "50 st", "20 st", "10 st", "5 st", "2 st", "1 st"); // billets ou monnaies
$TV = array(500, 200, 100,50, 20, 10, 5, 2, 1, 0.50, 0.20, 0.10, 0.05, 0.02, 0.01);   // valeur des billets et des monnaies
$TCA = array(1,1,0,2,3,1,10,20,4,2,20,15,23,14,30);  // Quantité de caisse actuel 
$TCI = array(1,1,0,2,3,1,10,20,4,2,20,15,23,14,30);  // Quantité de caisse initial 

// le client doit ce montant  pour ces achats
$Montantdu = 35.58 ;

// Client donne des billets et des monnais à caissier

$Tclient = array(0,0,0,0,1,1,1,1,0,0,0,0,0,0,0);  // Quantité des billets et des monnaies de chaque valeur 
// Cela represant
;

for (i=0; $i<14; $i++) {
    $som = $som + $Tclient[i]*$TV[i] ;
}; 


var_dump($M);
var_dump($MV);
var_dump($TCI);
 echo ($Montantdu);
 echo ($a);
?>

/*
$t[i] = $MV[i] * 2;
$M = [
    500 => 1,
200: 1
100: 0 
50: 2 
20: 3
10: 1
5: 10
2: 20
1: 4
0,50: 2
0,20: 20
0,10: 15
0,05: 23
0,02: 14
0,01: 30
];
?>
*/