<?php
   // create a table of information
   echo "<table class='table'>";
   // find the number of records in the result set
   $size = count($data);
   for($i=0; $i<$size; $i++){
     // create a table row using each record
        echo "<tr>";
        foreach($data[$i] as $label=>$value){
                echo "<td>{$value}</td>";
        }
        echo "</tr>";

   } // end for
   echo "</table>";

