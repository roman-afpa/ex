

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="TP1.php" method="post">
        <label> Montantdu</label><br>
        <input type="text" name="Montantdu"> 
        <?php echo $_POST ["Montantdu"] , "Eur"; ?> <br>
    " Montant donné" <br>        
        <input type="text" name="Tclient[0]"><br>
        <input type="text" name="Tclient[1]"><br>
        <input type="text" name="Tclient[2]"><br>
        <input type="text" name="Tclient[3]"><br>
        <input type="text" name="Tclient[4]"><br>
        <input type="text" name="Tclient[5]"><br>
        <input type="text" name="Tclient[6]"><br>
        <input type="text" name="Tclient[7]"><br>
        <input ype="text" name="Tclient[8]"><br>
        <input type="text" name="Tclient[9]"><br>
        <input type="text" name="Tclient[10]"><br>
        <input type="text" name="Tclient[11]"><br>
        <input type="text" name="Tclient[12]"><br>
        <input type="text" name="Tclient[13]"><br>
        <input type="text" name="Tclient[14]"><br>
        <input type="submit" value="Entrez"><br>
    </form>
</body>
</html>
<?php
$M  = array("500", "200", "100","50", "20", "10", "5", "2", "1", "50 st", "20 st", "10 st", "5 st", "2 st", "1 st"); // billets ou monnaies
$TV = array(500, 200, 100,50, 20, 10, 5, 2, 1, 0.50, 0.20, 0.10, 0.05, 0.02, 0.01);   // valeur des billets et des monnaies
$TCA = array(1,1,0,2,3,1,10,20,4,2,20,15,23,14,30);  // Quantité de caisse actuel 
$TCI = array(1,1,0,2,3,1,10,20,4,2,20,15,23,14,30);  // Quantité de caisse initial 
$QTETCA = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0); 
$som = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
$som1 = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
$resultRendre = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
$TCF = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);

// le client doit au magasin ce montant  pour ces achats
$Montantdu =  $_POST["Montantdu"];
echo "Montant du " , $Montantdu, " Eur"; 

// Client donne des billets et des monnais à caissier
$Tclient = $_POST["Tclient"];

//$Tclient = array(0,0,0,0,1,1,1,1,0,0,0,0,0,0,0);  // Quantité des billets et des monnaies de chaque valeur 
//var_dump($Tclient); 
// Cela represant
$som=0;
for ($i=0; $i<15; $i++) {
    $som = $som + $Tclient[$i]*$TV[$i];      
    $TCA[$i]=$TCA[$i]+$Tclient[$i];
}
echo "<br> Montant donné au caisieur: ", $som , " Eur";
// Montant a rendre ou restant
$result = $som-$Montantdu;
    if ($result>0) {
        echo "<br> Je vous doit rendre: ", $result, " Eur".PHP_EOL; 
     }           
    else {
        echo "<br> Vous devez encore: " , $result*(-1) , " Eur".PHP_EOL;
    }
 // Calcul des billets et monnais à rendre  
 //$QTETCA[$i] =0; // quantitées des billets et monnais
// $som[$i]=0; // somme des billers et des monnais 
 // $somRendre =0; // somme à rendre
 $somRendre=0;
 for     ($i=0; $i<15; $i++)  {   
    for ($j=1; $j<$TCA[$i]; $j++) {
        if ($result >=  $TV[$i] && $TCA[$i]>0) {       
            $TCA[$i]--;
            $QTETCA[$i]++;
            echo "<br> QTE ", $QTETCA[$i], " * Valeur ", $TV[$i];   
            $som1[$i] =  $TV[$i];
        echo " = ", $som1[$i],  " Eur " .PHP_EOL; 
            $result =  round ($result-$som1[$i],2); 
            echo "On reste ", $result.PHP_EOL ; 
   //     echo "<br> On reste ", (round ($result,2) ).PHP_EOL ; 

        $somRendre = $somRendre + $som1[$i];                   
        }                   
    }     
 }   
    echo "<br> Total rendu ",$somRendre , " Eur" .PHP_EOL;
 //   var_dump($TCA);
 //Comparer etat de stock de caisse
 
 for ($i=0; $i<15; $i++) {
    $TCF[$i]=$TCA[$i]-$TCI[$i];   
    if ($TCF[$i]<0) {
   echo " <br> Q-te ", $TCF[$i]*(-1), " * ", $M[$i].PHP_EOL;
   $TCA[$i] =   $TCF[$i]*(-1) + $TCA[$i] ;  
   echo "<br>Je doit allez chercher chez monéteur ";
    } 
    
 }   
  //Total de caisse 
  $TotalCaisse = 0;
  for ($i=0; $i<15; $i++) {
    $TotalCaisse = $TotalCaisse + $TCA[$i]*$TV[$i];
 //   echo "<br>", $TCA[$i], " : ",$TV[$i], " : ",$TCA[$i]*$TV[$i], " : ", $TotalCaisse, " :  " ,$M[$i] , " : " ;
    
  }
  Echo "<br>Actuelement dans ma caisse :",  $TotalCaisse, " Eur"; 
 
var_dump($TCI);
var_dump($TCA);
// var_dump($TV);
// var_dump($M);
var_dump($TCF);

?>

