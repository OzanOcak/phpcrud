<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>
        <div class="d-flex justify-content-between my-3">
          <h2>Novels</h2>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add a new book
          </button>
        </div>
        <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Book Name</th>
                    <th>Author Name</th>
                    <th>Published Year</th>
                </tr>
            </thead>
            <tbody> 
                <?php
                
                $query = "select * from `students`";

                $result = mysqli_query($connection,$query);

                if(!$result){
                    die("query failed".mysqli_error());
                }
                else{
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><a href="update_page_1.php?id=<?php echo $row['id']; ?>" class="btn btn-success">update</a></td>
                    <td><a href="delete_page.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">delete</a></td>

                  </tr>
                        <?php
                    }
                }

                 ?>
                
               
            </tbody>
        </table>

<?php 
   if(isset($_GET['message'])){
    echo "<h6 class='text-center'>".$_GET['message']."</h6>";
   }
?>

<?php 
   if(isset($_GET['insert_msg'])){
    echo "<h6 class='text-center text-success'>".$_GET['insert_msg']."</h6>";
   }
?>

<?php 
   if(isset($_GET['update_msg'])){
    echo "<h6 class='text-center text-success'>".$_GET['update_msg']."</h6>";
   }
?>

<?php 
   if(isset($_GET['delete_msg'])){
    echo "<h6 class='text-center text-danger'>".$_GET['delete_msg']."</h6>";
   }
?>

<!-- Modal -->
<form action="insert_data.php" method="post">
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="f_name">Novel Name:</label>
            <input type="text" class="form-control" id="f_name" name="f_name" placeholder="">
          </div>
          <div class="form-group">
            <label for="l_name">Author Name:</label>
            <input type="text" class="form-control" id="l_name" name="l_name" placeholder="">
          </div>
          <div class="form-group">
            <label for="age">Year</label>
            <input type="text" class="form-control" id="age" name="age" placeholder="">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="addBtn" value="ADD">
    </div>
  </div>
 </div>
</form>

<?php include('footer.php'); ?>
