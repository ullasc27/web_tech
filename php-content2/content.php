<!-- Header File (navebar) included. -->
<?php
include('header.php'); 
include('config/config.php');
?>


<div id="container">
            
        <!-- div will Display TinyMCE Content form database -->
            <?php
                if(isset($_GET['id'])){
                    $id=$_GET['id'];
                    $sql="SELECT * FROM `content` WHERE `content`.`con-id` = $id";
                    $result=mysqli_query($con,$sql);
                    if(mysqli_num_rows($result)>0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo '<div class="card"  style="color: black;">
                                        <div class="card-header">
                                            '.$row["title"].'
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">'.$row["notes"].'</p>
                                            <a href="showcontent.php" class="btn btn-primary">Back</a>
                                        </div>
                                    </div>';
                        }
                    }else{
                        echo '<div class="alert alert-danger" role="alert">
                        <strong>Invalid ID! </strong> No Record find.
                    </div>';
                    }
                    
                }else{
                    header('lcation: showcontent.php');
                }
            ?>
		

</div>

<!-- Footer included. -->
<?php include('footer.php'); ?>