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
// include('header.php'); 
// include('config/config.php');
//TinyMCE working  banckend inserting data

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
            $sql = "INSERT INTO  content(title,notes,user_id) VALUES ('$title','$textNote','$user_id')";
            if(mysqli_query($con,$sql)){
                header("Location:showcontent.php");
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

  			<button class="btn btn-primary" name="submit" type="submit">Submit</button>
	
    </form>

  
</div>

<!-- Footer included. -->
<?php include('footer.php'); ?>