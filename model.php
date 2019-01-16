<?php
/* User-defined functions */
 function getAllRecords($sql, $parameters = null){
        /*  This method returns an array of Associative arrays. */
        global $db;
        // prepare an object of  PDOStatement class using SQL statement
        $stm = $db->prepare($sql);

        // execute the statement
        $stm->execute($parameters);
        // obtain data using fetchAll() method
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
 }

  function getOneRecord($sql, $parameters = null){
        /* This method returns an associative array. */
        global $db;
        // prepare an object of  PDOStatement class using SQL statement
        $stm = $db->prepare($sql);

        // execute the statement
        $stm->execute($parameters);
        // obtain data using fetch() method
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        return $result;
 }

?>
