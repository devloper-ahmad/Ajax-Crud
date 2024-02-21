<?php
include "db_con.php";

extract($_POST);

if(isset($_POST['readrecord'])){
    
    $data = '<table class="table table-bordered">
    <thead class="table-dark">
    <tr>
    <th scope="col">ID</th>
    <th scope="col">First Name</th>
    <th scope="col">Last Name</th>
    <th scope="col">Email</th>
    <th scope="col">phone</th>
    <th scope="col">gender</th>
    
    <th scope="col">Action</th>
  </tr>
 </thead>';


$sql = "SELECT * FROM `ajax`";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
$number = 1;

while ($row = mysqli_fetch_assoc($result)) {
    $data.= '<tr>

    <td>'.$number.'</td>
    <td>'.$row['firstname'].'</td>
    <td>'.$row['lastname'].'</td>
    <td>'.$row['email'].'</td>
    <td>'.$row['phone'].'</td>
    <td>'.$row['gender'].'</td>
    
    <td>
      <button onclick="GetUserDetails('.$row['id'].')"<i class="fa-solid fa-pen-to-square fs-5 me-3"></i></button>
      <button onclick="DeleteUser('.$row['id'].')"<i class="fa-solid fa-trash fs-5"></i></a>
    </td>
    </tr>';
    $number++;
}

    
}
$data .= '</table>';
echo $data;

}

if(isset($_POST['firstname']) &&  isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['gender']) )


{

    $sql = "INSERT INTO `ajax`(`id`, `firstname`, `lastname`, `email`,`phone`,`gender` ) VALUES (NULL,'$firstname','$lastname','$email','$phone','$gender')";
   mysqli_query($conn, $sql);

}
if(isset($_POST['deleteid'])){

    $userid=$_POST['deleteid'];
    $sql = "DELETE FROM ajax WHERE id = '$userid' " ; 
    mysqli_query($conn, $sql);

}

if(isset($_POST['id']) && isset($_POST['id']) !="")
{
    $userid = $_POST['id'];
    $sql = "SELECT * FROM ajax WHERE id = '$userid' " ; 
    if(!$result = mysqli_query($conn,$sql)){
        exit(mysqli_error());
    }


    $response = array();
    if(mysqli_num_rows($result) > 0){

        while ($row = mysqli_fetch_assoc($result)) {
            $response = $row;
        }
    }
    else{
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
echo json_encode($response);
}
else{
    $response['status'] = 200;
    $response['message'] = "Invalid Request";

}

if(isset($_POST['hidden_user_idupd'])){

    $hidden_user_idupd = $_POST['hidden_user_idupd'];
    $firstnameupd = $_POST['firstnameupd'];
    $lastnameupd = $_POST['lastnameupd'];
    $emailupd = $_POST['emailupd'];
    $phoneupd = $_POST['phoneupd'];
    $genderupd = $_POST['genderupd'];
 $sql = "UPDATE `ajax` SET `firstname`='$firstnameupd',`lastname`='$lastnameupd',`email`='$emailupd',`phone`='$phoneupd',`gender`='$genderupd' WHERE id = '$hidden_user_idupd'";
   if(!$result = mysqli_query($conn, $sql)){

exit(mysqli_error());


   }
}


?>