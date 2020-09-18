<!-- Header File (navebar) included. -->

<?php 
// ///Session validate

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

<?php 
// update works
    if(isset($_GET['updateID'])){
        $id=$_GET['updateID'];
        $sql="SELECT * FROM `content` WHERE `content`.`con-id` = $id";
        $result=mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                $title=$row["title"];
                $textNote=$row["notes"];

            }

        }else{
            header('Location: showcontent.php');
        }
    }
    else{
        header('Location: showcontent.php');

    }
// 
////TinyMCE working  banckend inserting data

    if(isset($_POST['submit'])){
        if(isset($_POST['title']) && !empty($_POST['title']) ){
            $title=$_POST['title'];

        }else{
            $error='<div class="alert alert-danger" role="alert">
            <strong>Error!</strong>Please enter title field.
            </div>';

        }
        if(isset($_POST['content']) && !empty($_POST['content']) ){
            $textNote=$_POST['content'];

        }else{
            $textError='<div class="alert alert-danger" role="alert">
            <strong>Error!</strong>Please enter text content field.
            </div>';
        }
        // capturing user id
        $user_id=$_SESSION['id'];
        // inserting content
        if(isset($title) && !empty($title) && isset($textNote) && !empty($textNote)){
            $id=$_POST['uId'];
            $sql = "UPDATE `content` SET `title`='$title',`notes` = '$textNote' WHERE `content`.`con-id` = $id ";
            if(mysqli_query($con,$sql)){
                header("Location:showcontent.php?success=2");
            }else{
                $dbError='<div class="alert alert-danger" role="alert">
                <strong>Error!</strong>Try again later.
                </div>'.mqsqli_error($con);

            }

        }



    }

?>

  
<div id="container">
    
    <!-- Message For Error -->
    <div class="alert alert-danger" role="alert">
                <!-- Error Message. -->
    </div>
    
    <h4 class="text-center">Add Content</h4>
    <!-- Form -->
    <form method="post" target="">
  		
            <div class="form-group">
    			<label for="contenttitle">Title</label>
                <input type="text" class="form-control" id="contenttitle" name="title" 
                placeholder="Title" value="<?php if(isset($title)) echo $title; ?>">
  			</div>
              <?php if(isset($error)) echo $error?>
  			<div class="form-group">
    			<label>Content</label>
                
                <!-- TinyMCE Embed Here by Using ID (mytextarea)-->
            <textarea id="mytextarea" name="content"> <?php if(isset($textNote)) echo $textNote; ?>
            </textarea>
  			</div>
              <?php if(isset($textError)) echo $textError?>
              <!-- hidden id storing for update -->
            <input type="hidden" name="uId" value="<?php if(isset($id)) echo $id; ?>">
  			<button class="btn btn-primary" name="submit" type="submit">Submit</button>
	
    </form>

  
</div>

<!-- Footer included. -->
<?php include('footer.php'); ?>