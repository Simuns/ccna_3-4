<?php
ini_set("display_errors","1");
error_reporting(E_ALL);

// Er det fra form.html med name="navn"?

if (isset($_POST["Navn"] ) ) {
   $navn = $_REQUEST["Navn"];           // data fra form.html
   $adr  = $_REQUEST["Adresse"];
   $Postnr = $_REQUEST["Postnr"];
// Her begynder SQL
   
   $servername = "sql.linuxgruppe4.local";
   $database   = "TEC";
   $username   = "service_sql";
   $password   = "grindspikeplir";

   $connect    = mysqli_connect($servername,$username,$password,$database);
   if (mysqli_connect_errno()) {
         echo "Fejl ved connection: " . mysqli_connect_error(); 
       }
   else { 
       // Connection er OK - insert records i databasen
        $sql =  "INSERT INTO Medlemmer (Navn, Adresse, Postnummer) ";
        $sql .= "VALUES ('";
        $sql .= $navn;
        $sql .= "','";  // adskil med kolon og komma: ('navn','addresse')
        $sql .= $adr;
        $sql .= "','";  // adskil med kolon og komma: ('navn','addresse')
        $sql .= $Postnr;
        $sql .= "')";   


        if (mysqli_query($connect, $sql)) {  // ER SQL insert OK?
           echo("<script>alert('Record oprettet');window.location.href='form.html';</script>");
	   }
        else {
	   echo "Fejl: " . $sql . mysqli_error($connect);
	   }
       }
   }
else {
   echo "Fejl";
}
exit;
?>
