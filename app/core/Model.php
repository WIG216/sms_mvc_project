<?php

/** 
 * Main model class
 */

class Model
{
    use Database;
    protected $table = 'admin';

    // for pagination
    protected $limit = 10;
    protected $offset = 0;

    // return one row
    public function first($data, $data_not = [])
    {
        $query = "select * from $this->table where ";
        $key = array_keys($data);
        $key_not = array_keys($data_not);


        // .= is for concatinating (that is adding the statement)
        foreach ($key as $key) {
            $query .= $key . "= :" . $key . " && ";
        }

        foreach ($key_not as $key) {
            $query .= $key . "!= :" . $key . " && ";
        }

        $query = trim($query, " && ");
        $query .= " limit $this->limit offset $this->offset";
        // $query = "select * from $this->table where id = :id && date = now() && id != :id && ";

        // echo $query;
        $data = array_merge($data, $data_not);
        
        $result =  $this->query($query, $data);
        if ($result) {
            return $result[0];
        }

        return  false;
    }

    // return multiple rows
    public function where($data, $data_not = [])
    {
        $query = "select * from $this->table where ";
        $key = array_keys($data);
        $key_not = array_keys($data_not);


        // .= is for concatinating (that is adding the statement)
        foreach ($key as $key) {
            $query .= $key . "= :" . $key . " && ";
        }

        foreach ($key_not as $key) {
            $query .= $key . "!= :" . $key . " && ";
        }

        $query = trim($query, " && ");
        $query .= " limit $this->limit offset $this->offset";
        // $query = "select * from $this->table where id = :id && date = now() && id != :id && ";

        // echo $query;
        $data = array_merge($data, $data_not);
        return  $this->query($query, $data);
    }

    // insert data
    public function save($data)
    {
        $keys = array_keys($data);

        $query = "insert into $this->table (" . implode(",", $keys) . ") values (:" . implode(",:", $keys) . ") ";
        $this->query($query, $data);

        return false;
    }

    // update data
    public function update($id, $data, $id_column = 'id')
    {
        $key = array_keys($data);
        $query = "update $this->table set ";

        foreach ($key as $key) {
            $query .= $key . " = :" . $key . ", ";
        }

        $query = trim($query, ", ");

        $query .= " where $id_column = :$id_column";

        $data[$id_column] = $id;
        $this->query($query, $data);

        return  false;
    }

    // delete data
    public function delete($id, $id_column = 'id')
    {
        $data[$id_column] = $id;
        $query = "delete from $this->table where id = :$id_column";

        $this->query($query, $data);

        return false;
    }
}
