<!-- This snippet was made by Glori4n(https://glori4n.com) as an exercise -->

<?php

class DB{

    // Declaration of PDO's parameters.
    private $pdo;
    private $numRows;
    private $allEntries;
    private $singleEntry;

    public function __construct($host, $dbname, $dbuser, $dbpass){

        // Will attempt a connection with PDO, using the parameters listed above, if it fails, it will catch PDO's exception and store it on $e. 
        try {
            $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host, $dbuser, $dbpass);
        } catch(PDOException $e) {
            echo "Failed: ".$e->getMessage();
        }

    }

    public function query($sql){
        $query = $this->pdo->query($sql);
        $this->numRows = $query->rowCount();
        $this->singleEntry = $query->fetch();
        $this->allEntries = $query->fetchAll();
    }

    public function resultAll(){
        return $this->allEntries;
    }

    public function singleEntry(){
        return $this->singleEntry;
    }

    public function rowNum(){
        return $this->numRows;
    }

    public function insert($sql){
        $this->pdo->query($sql);
    }

    public function update($sql){
        $this->pdo->query($sql);
    }

    public function delete($sql){
        $this->pdo->query($sql);
    }
}

