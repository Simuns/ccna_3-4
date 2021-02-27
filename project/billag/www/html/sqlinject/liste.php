<?php
ini_set("display_errors","1");
error_reporting(E_ALL);

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
        $sql =  "Select * FROM Medlemmer INNER JOIN Postnumre ON Postnummer = Postnr";
        $result = mysqli_query($connect, $sql); 

        if (mysqli_num_rows($result) > 0) {  // Findes records?

           echo "<table border='1'>";
           while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["Navn"] . "</td><td>" . $row["Adresse"] . "</td><td>" . $row["Postnummer"] . "</td><td>" . $row["Byen"] . "</td></tr>"; 
               }
           echo "</table>";
	   }
        else {
	   echo "Fejl: " . $sql . mysqli_error($connect);
	   }
       }
   
mysqli_close($connect);
exit;
?>
