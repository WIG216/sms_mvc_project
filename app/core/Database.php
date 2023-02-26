<?php

// class can only use extend once
// you can't instatiating a trait. it can not run on it own

Trait Database
{

    private function connect()
    {
        try {
            // OOP method
            // $con = new mysqli(DBHOST, USERNAME, PASSWORD, DBNAME);

            // PDO method
            $string = "mysql:hostname=".DBHOST.";dbname=". DBNAME;
            $con = new PDO($string,USERNAME,PASSWORD);
            return $con;
        
        } catch (PDOException $error) {
            // echo ($con->connect_error);
            return "Connection failed: " . $error->getMessage();
        }
    }

    // prepared statement supplies the query separately from then data to reduce SQL injection
    public function query($query, $data = [])
    {
        $con = $this->connect();
        $stm = $con->prepare($query);

        $check = $stm->execute($data);
        if($check)
        {
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            if(is_array($result) && count($result))
            return $result;
            
        }
        return false;
    }
}
