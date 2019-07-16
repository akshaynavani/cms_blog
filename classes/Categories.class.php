<?php
/**
 * Created by PhpStorm.
 * User: Hp
 * Date: 29-01-2019
 * Time: 06:31 PM
 */

class Categories
{
    private $table ="categories";
    private $category_id;
    private $category_name;
    private $category_status;
    private $conn;

    /**
     * Categories constructor.
     * @param $conn
     */
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    function readAllCategories(){
        $sql = "SELECT * FROM {$this->table}";
        $statement = $this->conn->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }


}