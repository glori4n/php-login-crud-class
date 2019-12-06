<!-- This snippet was made by Glori4n(https://glori4n.com) as an exercise -->

<?php

class DB{

    // Declaration of PDO's parameters.
    private $pdo;
    private $numRows;
    private $entries;

    public function __construct($host, $dbname, $dbuser, $dbpass){

        // Will attempt a connection with PDO, using the parameters listed above, if it fails, it will catch PDO's exception and store it on $e. 
        try {
            $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host, $dbuser, $dbpass);
        } catch(PDOException $e) {
            echo "Failed: ".$e->getMessage();
        }

    }

    // this function receives the query and inserts it on the database as well as filling up some of this class' variables.
    public function query($sql){
        $query = $this->pdo->query($sql);
        $this->numRows = $query->rowCount();
        $this->entries = $query->fetchAll();
    }

    // Returns all entries.
    public function listEntries(){
        return $this->entries;
    }

    // Returns the number of rows.
    public function rowNum(){
        return $this->numRows;
    }

    // Insert.
    public function insert($sql){
        $this->pdo->query($sql);
    }

    // Update.
    public function update($sql){
        $this->pdo->query($sql);
    }

    // Deletes.
    public function delete($sql){
        $this->pdo->query($sql);
    }
}