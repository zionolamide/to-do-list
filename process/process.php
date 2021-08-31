<?php
if(isset($_POST['add'])){
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    if(empty($message)){
        $_SESSION['error'] = "field is empty";
    }else{
       $query = "SELECT * FROM to_do_list WHERE message='$message'";
       $query_result = mysqli_query($conn, $query);

       if(mysqli_num_rows ($query_result) > 0){
           $_SESSION['error'] = "list has already been added";
       }else{
        $sql = "INSERT INTO to_do_list (`message`) VALUES ('$message')";
        $result = mysqli_query($conn, $sql);
        $_SESSION['success'] = "record has been added";
       }
    }
}


if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $result = $conn->query("DELETE FROM to_do_list WHERE  id='$id'")or die($conn->error());
   
    // header("location:index.php");
    $_SESSION['error'] = "Record has been deleted";
}

$query = "SELECT  COUNT(id) AS COUNT FROM `to_do_list`";
$query_result = mysqli_query($conn, $query);

$result = $conn->query("SELECT * FROM to_do_list")or die($conn->error());
while($row = mysqli_fetch_assoc($query_result)){
$list = ""." ".$row['COUNT'];
 
}
?>