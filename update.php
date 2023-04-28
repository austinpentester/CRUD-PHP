<?php
include 'conn.php';
if(isset($_POST['update'])){

  $username = $_POST['username'];
  $email = $_POST['email'];
  $age = $_POST['age'];
  $password = $_POST['Password'];
  $id = $_GET['update'];
  $sql = "UPDATE `data` SET `username`='$username',`email`='$email',`age`='$age',`Password`='$password' WHERE id='$id'";
  if(mysqli_query($conn,$sql)){
    header("Location: view_data.php");
  }
}


?>








<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
    <!-- place navbar here -->
    <h1 class="text-center">Update Data</h1>
  </header>
  <main class="m-5">

  <?php
      include 'conn.php';
      $id = $_GET['update'];
      $sql = "SELECT * FROM `data` WHERE id='$id'";
      $result = mysqli_query($conn,$sql);
      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
          

?>
  <form  method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">User Name</label>
    <input type="text" name="username" value="<?php echo $row['username'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
   
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email"  value="<?php echo $row['email'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Age</label>
    <input type="number" name="age" value="<?php echo $row['age'] ?>" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="text" name="Password" value="<?php echo $row['Password'] ?>" class="form-control" id="exampleInputPassword1">
  </div>

  <center><button type="Submit" name="update" class="btn btn-primary">Update</button></center>
</form>

<?php
        }}
?>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>