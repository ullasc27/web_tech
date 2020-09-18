<?php 
include('header.php'); 
include('config/config.php');

session_start();
if( isset($_SESSION['email']) && isset($_SESSION['id']) ){

    echo "<br><a href='logout.php'>Logout</a>";
    $ss=$_SESSION['id'];
}
else{
    header('location: login.php');
    return;
}

?>


<div id="container">
    <!-- Search Form -->
	<form target="" method="post">
  			<div class="form-group">
    		    <label for="searchtitle">Search</label>
    		    <input type="text" class="form-control" id="searchtitle" name="search" value="<?php if(isset($ss)) echo $ss; ?>" required>
  			</div>
  			<button class="btn btn-primary" name="submit" type="submit">Search</button>
	</form>

	<!-- jdjjdjdj -->
		<?php
		if(isset($_POST['search'])){
			echo '	<h4 class="text-center">Search Your Post</h4>
			<table class="table table-striped">
					
					<tr>
						<th>POST ID</th>
						<th>Title</th>
						<th>Added Date</th>
						<th>View</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
			
					<tbody>';

				//   
				$search=$_POST['search'];

				$user=$_SESSION['id'];
				$user=$search;
				
				// $sql = "SELECT * FROM `content` WHERE `content`.`con-id` LIKE '%{$search}%' OR  `content`.`title` LIKE LIKE '%{$search}%'";
				$sql = "SELECT * FROM `content` WHERE `content`.`user_id`=$user";
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
				echo '<tr><td>No post Matches yet.</td></tr>';
				}

		  }
        
          ?>
            
      </tbody>
    
    </table>


</div>

<?php include('footer.php'); ?>