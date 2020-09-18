<!-- Header File navebar _included. -->
<?php 
include('header.php'); 
include('config/config.php');

session_start();
if( isset($_SESSION['email']) && isset($_SESSION['id']) ){

    echo "<br><a href='logout.php'>Logout</a>";

}
else{
    header('location: login.php');
    return;
}
?>

<div id="container">
  <?php
  // form deleting windows
    if(isset($_GET['deleteID'])){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Are you want delete this?</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <form target="" method="post">
        <br>
          <input type="hidden" name="delId" value="'.$_GET['deleteID'].'">
          <button type="submit" name="delete" class="btn btn-danger">Yes</button>
          
          <button type="button" class="btn btn-info" data-dismiss="alert">
        <span aria-hidden="true"> No! </span>
      </button>      
      </form>
    </div>';

    }
    if(isset($_POST['delId'])){
      $bID= $_POST['delId'];
      // 
      $sql = "DELETE FROM `content` WHERE `content`.`con-id` = $bID";
      if(mysqli_query($con,$sql)){
        header("Location: showcontent.php?success=1");       
      }
      else{
        echo "Rcord not deleted".mysqli_error($con);
      }
    }
    if(isset($_GET['success'])){
      if($_GET['success']==1){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Deleted sucessfully.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';

      }
      if($_GET['success']==2){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Updated sucessfully.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';

      }



    }
  ?>
    
    
    
  <h4 class="text-center">Content</h4>
  <table class="table table-striped">
        
        <tr>
            <th>POST_ID</th>
            <th>Title</th>
            <th>Added Date</th>
            <th>View</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <tbody>
          <?php
          $user=$_SESSION['id'];
          $sql = "SELECT * FROM content WHERE user_id=$user";
          $result = mysqli_query($con,$sql);
          if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
            echo '<tr>
              <td>'.$row['con-id'].'</td>
              <td>'.$row["title"].'</td>
              <td>'.$row["addedDate"].'</td>
              <td><a href="content.php?id='.$row["con-id"].'" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
              <td><a href="update.php?updateID='.$row["con-id"].'" class="btn btn-primary"><i class="fas fa-edit"></i></a></td>
              <td><a href="showcontent.php?deleteID='.$row['con-id'].'" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
            </tr>';

            }
          }else{
            echo '<tr><td>No post published yet.</td></tr>';
          }
          ?>
            
      </tbody>
    
    </table>
</div>


<!-- End side -->

<!-- Footer include. -->
<?php include('footer.php'); ?>