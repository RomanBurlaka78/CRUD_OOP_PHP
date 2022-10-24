<?php
class Database {
    private $localhost = "localhost";
    private $db = "cart";
    private $root = "root";
    private $password = "";
    public $conn;
    //public $products= array();

   function __construct() {
        $this->getConnection() ;
    }

    public function getConnection() {
        $this->conn;
        try{
            $this->conn = new mysqli($this->localhost, $this->root, $this->password, $this->db);
            if( $this->conn->connect_error ) {
                echo "Connected Failed";
                exit();
            }
            else {
                //echo "Connected";
            }
        }catch(Exception  $exception){
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
    //end getConnection
    public function getRead() {
        $sql = "SELECT * FROM products";
        $result = $this->conn->query($sql);

        if($result->num_rows>0){
            while($row=$result->fetch_assoc()) {
                $products[] = $row;
                

            }
        }

        return $products;
    }
    //end getRead
    public function getReadbyId($get_id){
      
        $sql = "SELECT * FROM products WHERE id = '$get_id'";
        $result = $this->conn->query($sql);
        
        if($result->num_rows==1){
          $row = $result->fetch_assoc();
                //var_dump ($row);
                return $row;

            }

    }
    public function getDeleteId($get_delete){
      
        $sql = "DELETE FROM products WHERE `products`.id = '$get_delete'";
        $result = $this->conn->query($sql);
      
        if(isset($num_rows)) {
            if($result->num_rows==1){
                $row = $result->fetch_assoc();
                    //var_dump ($row);
                    return $row;
    
                }
            }
       

       


    }
    //
    public function getEditId($get_edit){
      
        $sql = "SELECT * FROM products WHERE  id = '$get_edit'";
        $result = $this->conn->query($sql);
      

            if($result->num_rows==1){
                $row_edit = $result->fetch_assoc();
                   //var_dump ($row_edit);
                    return $row_edit;
    
                }
         

       


    }
    //insert
    public function getInsert(){
        $in_id = $_POST['id'];
        $in_name = $_POST['name'];
        $in_price = $_POST['price'];

        $sql = "INSERT INTO products(id, name, price) VALUES ('$in_id',' $in_name','$in_price ')";
        $result = $this->conn->query($sql);
       var_dump($conn) ;
     

    }
    //destruct
    function __destruct() {
        $this->conn->close();

    }
   
   
}





















?>


