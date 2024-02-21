<?php
// include "db_conn.php";
include "header.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<body>



<div class="container mb-4 mt-5">

<!-- Button trigger modal -->
<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add New
</button>
<div>

<h2 class="mb-4 mt-5">All Records</h2>
<div id="records_content"></div>

</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Records</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <!-- <form method="post" action="" id="sform" onsubmit="saveData()"> -->
      <div class="row mb-3">
               <div class="col">
                  <label class="form-group">First Name:</label>
                  <input type="text" class="form-control"id="firstname" name="firstname" placeholder="Ahmad"><b><span class="formerror"> </span></b>
               </div>

               <div class="col">
                  <label class="form-group">Last Name:</label>
                  <input type="text" class="form-control"id="lastname" name="lastname" placeholder="Saeed"><b><span class="formerror"> </span></b>
                  
               </div>
            </div>

            <div class="mb-3">
               <label class="form-group">Email:</label>
               <input type="email" class="form-control"id="email" name="email" placeholder="name@example.com"><b><span class="formerror"> </span></b>
               
            </div>
            <div class="mb-3">
               <label class="form-group">phone:</label>
               <input type="tel" class="form-control"id="phone" name="phone" placeholder="03486094604"><b><span class="formerror"> </span></b>
            </div>
            <div class="mb-3">

<label >Gender</label>
<select name="gender" id="gender">
  <option value="" >Select</option>
  <option value="male">Male</option><span class="text-danger">
  <option value="female">Female</option>
</select>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="addRecord()">Submit</button>
        <a href="index.php" class="btn btn-danger">Close</a>
      </div>
</form>
    </div>
  </div>
</div>

<!-- Modal For Update Records -->

<div class="modal fade" id="update_user_model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Records</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="fm">
      <div class="row mb-3">
               <div class="col">
                  <label class="form-group">First Name:</label>
                  <input type="text" class="form-control"id="update_firstname" name="firstname" placeholder="Ahmad"><b><span class="formerror"> </span></b>
                 
     
               </div>

               <div class="col">
                  <label class="form-group">Last Name:</label>
                  <input type="text" class="form-control"id="update_lastname" name="lastname" placeholder="Saeed"><b><span class="formerror"> </span></b>
                  
               </div>
            </div>

            <div class="mb-3">
               <label class="form-group">Email:</label>
               <input type="email" class="form-control"id="update_email" name="email" placeholder="name@example.com"><b><span class="formerror"> </span></b>
               
            </div>
            <div class="mb-3">
               <label class="form-group">phone:</label>
               <input type="tel" class="form-control"id="update_phone" name="phone" placeholder="03486094604"><b><span class="formerror"> </span></b>
            </div>
            <div class="mb-3">

<label >Gender</label>
<select name="gender" id="update_gender">
  
  <option value="male">Male</option><span class="text-danger">
  <option value="female">Female</option>
</select>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="updateuserdetail()">Update</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="Close">Close </button>
        <input type="hidden" name="" id="hidden_user_id">
      </div>
    </div>
  </div>
</div>

</div>









<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script>




$(document).ready(function(){

readRecord();

});

function readRecord(){
    var readrecord = "";
    $.ajax({
        url:"backend.php",
        type:'post',
        data: {
          readrecord:readrecord
          
        },
  success:function(data,status){
          $('#records_content').html(data);
        }
    });
}

    function addRecord(){

var firstname = $('#firstname').val();
var lastname = $('#lastname').val();
var email = $('#email').val();
var phone = $('#phone').val();
var gender = $('#gender').val();

$.ajax({

    url:"backend.php",
    type:'post',
    data: {
        firstname:firstname,
        lastname:lastname,
        email:email,
        phone:phone,
        gender:gender
    },

    success:function(data,status){
      readRecord();
    }
});

    }

function DeleteUser(deleteid){
  
var conf =  confirm("Are You sure");
if(conf==true){
$.ajax({

    url:"backend.php",
    type:'post',
    data: {
      deleteid:deleteid},

    success:function(data,status){
    readRecord();
  }

  });

}

}
function GetUserDetails(id){

  $('#hidden_user_id').val(id);

  $.post("backend.php",{
    id:id 
  },

  function(data,status){
    var user = JSON.parse(data);
    $('#update_firstname').val(user.firstname);
    $('#update_lastname').val(user.lastname);
    $('#update_email').val(user.email);
    $('#update_phone').val(user.phone);
    $('#update_gender').val(user.gender);

  }

  );

  $('#update_user_model').modal("show");
}

function updateuserdetail(){
  var firstnameupd = $('#update_firstname').val();
  var lastnameupd = $('#update_lastname').val();
  var emailupd =  $('#update_email').val();
  var phoneupd = $('#update_phone').val();
  var genderupd = $('#update_gender').val();

  var hidden_user_idupd = $('#hidden_user_id').val();


  $.post("backend.php",{
    hidden_user_idupd:hidden_user_idupd,
    firstnameupd:firstnameupd,
        lastnameupd:lastnameupd,
        emailupd:emailupd,
        phoneupd:phoneupd,
        genderupd:genderupd

  },

  function(data,status){
    $('#update_user_model').modal("hide");
    readRecord();



  }


  );
}


</script>


</body>
</html>