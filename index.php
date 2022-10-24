<?php

require_once "config.php";

$database = new Database();
$db_connect = $database->__construct();
$db_products = $database->getRead();
//$get_id= $database->getOderId()
if(isset($_GET['id'])) {
    $get_id = $_GET['id'];
   $id_record = $database->getReadbyId($get_id);
   //var_dump($id_record);
}
//delete
if(isset($_GET['id_delete'])) {
    $get_delete = $_GET['id_delete'];
    $id_delete = $database->getDeleteId($get_delete);
   //var_dump($id_record);
}
//edit
if(isset($_GET['id_edit'])) {
    $get_edit = $_GET['id_edit'];
    $id_edit = $database->getEditId($get_edit);
    //var_dump($id_edit); 
    
}

//insert
if(isset($_POST['sub_btn'])) {
    $insert = $database->getInsert($_POST);
    //var_dump($id_edit); 
    
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    
<div class="container">
    <?php if(isset($id_edit)):  ?>
    <div class="row">
    <h3 class= "text-center text-danger text-capitalise pt-5"> Edit cart</h3>
        <form action ="index.php" method = "post" class= "form-group  mt-5">
            <label for="id" class="form-label">Id</label>
            <input class = "form-control" type = "text" name = "id" value = "<?php echo $id_edit ['id']; ?>" > <br>
            <label for="name" class="form-label">Name</label>
            <input class = "form-control" type = "text" name = "name" value = "<?php echo $id_edit ['name']; ?>" > 
            <label for="price" class="form-label">Price</label>
            <br>
            <input class = "form-control" type = "text" name = "price" value = "<?php echo $id_edit ['price']; ?>" > 
            <input class = "form-control mt-3 w-50"  type = "submit" name = "sub_btn"  > 


        </form>
    </div>
    <?php endif; ?>
    <div class="row p-4">
        <h1 class= "text-center text-warning text-uppercase"> Shopping cart</h1>
        <!-- loop item of products-->
        <?php
        
        foreach($db_products as $product): ;?>
            
                    <div class="col-md-4 col-lg-3 col-sm-6">
                        <div class="card p-4 m-2 border border-info" style ="background:#cecece;">
                                <img src="<?php echo  $product['image']; ?>" class="card-img-top img-fluid" style="max-width:400px; heigth:auto; " alt="image"> 
                                <div class="card-body">
                                <h5 class="card-title "><?php echo $product['name']; ?></h5>
                                <p class="card-text"><?php echo $product['price']; ?></p>
                            <a href="index.php?id=<?php echo $product['id']; ?>" class="btn btn-primary">Add to Cart</a>
                                </div> 
                        </div>
                    </div>
        <?php endforeach;  ?>
    </div> 
    <div class="row p-2">
        
     <table class="table text-center  table-striped table-dark" style = "max-width: 600px; margin: 10px auto;">
           <h3 class="text-center text-info"> Cart  </h3>
                   <tr>
                       <th scope="col">id</th>
                       <th scope="col">name</th>
                       <th scope="col">img</th>
                       <th scope="col">price</th>
                       <th scope="col">quantity</th>
                       <th>Edite </th>
                       <th>Delete </th>
                   </tr>
                <?php if(isset($id_record)): ;
                 $n=1; ?>
                   <tr>
                       <td><?php echo $n++ ; ?></td>
                       <td><?php echo $id_record['name'] ; ?></td>
                       <td><img class ="img-fluid" style = "width:100px;" src="<?php  echo $id_record['image'] ; ?>" alt="image"></td>
                       <td><?php echo $id_record['price'] ; ?></td>
                       <td>???</td>
                       
                       <td> <a href="index.php?id_edit=<?php echo $id_record['id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
            </svg></a> </td>

                                <td><a href="index.php?id_delete=<?php echo $id_record['id']; ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
            </svg> </a></td>    
                            </tr>
                            <?php endif; ?>
                        
           </table> 
      
    </div>

    <div class="row">
        <?php 
              
        
           ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>