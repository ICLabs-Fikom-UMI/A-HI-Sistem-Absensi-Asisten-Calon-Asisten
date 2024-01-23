<?php

Trait Model {

    use Database;
    
    protected $limit = 10;
    protected $offset = 0;
    protected $order_type = "desc";
    protected $order_column = "nama";
    

    public function findAll(){
        $query = "SELECT * FROM $this->table ORDER BY $this->order_column $this->order_type limit $this->limit offset $this->offset";
        return $this->query($query);
    }

    public function where($data, $data_not = []){  // grab multiple records
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "SELECT * FROM $this->table WHERE ";
        foreach($keys as $key){
            $query .= $key . "= :".$key." && ";
        }
        foreach($keys_not as $key){
            $query .= $key . "!= :".$key. "&&";
        }
        $query = trim($query, "&&");
        $query .= " limit $this->limit offset $this->offset";
        $data = array_merge($data, $data_not); //option for using negation expression
        return $this->query($query, $data);
    }


    public function first($data, $data_not){ // return one row but without acrually having to use query
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "SELECT * FROM $this->table WHERE ";
        foreach($keys as $key){
            $query .= $key . "= :".$key." && ";
        }
        foreach($keys_not as $key){
            $query .= $key . "!= :".$key. "&&";
        }
        $query = trim($query, "&&");
        $query .= " ORDER BY $this->order_column $this->order_type limit $this->limit offset $this->offset";
        $data = array_merge($data, $data_not); //option for using negation expression
        $result = $this->query($query, $data);
        if($result) return $result[0];
        return false;
    }

    public function insert($data){
        $keys = array_keys($data);
        $query = "INSERT INTO $this->table (".implode(",", $keys).")VALUES(:".implode(",:", $keys).")";
        echo $query;
        $this->query($query, $data);
        return false; 
    }


    public function update($nama, $data, $nama_column = "nama"){ // update with id : ($id, $data, $id_column = 'ud')
        $keys = array_keys($data);
        $query = "UPDATE $this->table SET ";
        foreach($keys as $key){
            $query .= $key . "= :".$key.", ";
        }
        $query = trim($query, ",");
        $query .= " WHERE $nama_column = :$nama_column";
        $data[$nama_column] = $nama;
        // echo $query;
        $this->query($query, $data);
        // return false;
    }

    public function delete($nama, $nama_column = "nama"){
        $data[$nama_column] = $nama; 
 
        $query = "DELETE FROM $this->table WHERE $nama_column = :$nama_column";       
        $this->query($query, $data);
        return false; 
    }

}