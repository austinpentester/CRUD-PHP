<?php
include 'conn.php';


if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $sql = "DELETE FROM `data` WHERE id='$id';";
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
    <h1 class="text-center">View Data</h1>
  </header>
  <main class="m-5">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>User Name</th>
        <th>Email</th>
        <th>Age</th>
        <th>Password</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php
      

      $sql = "SELECT * FROM `data`";
      $result = mysqli_query($conn,$sql);
      if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
          

?>
      <tr>
        <td><?php echo $row['username'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['age'] ?></td>
        <td><?php echo $row['Password'] ?></td>
        <td><a  href="update.php?update=<?php echo $row['id'] ?>" class="btn btn-success">Edit</a></td>
        <td><a  href="?delete=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a></td>
      </tr>
<?php

        }}
?>
    </tbody>
  </table>
  <a href="insert.php" class="btn btn-success">Insert Data</a>
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