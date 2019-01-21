<?php include "includes/header.php" ?>
<?php include "function.php" ?>

    <div id="wrapper">

        <!-- Navigation -->
       
        <?php include "includes/navigation.php" ?>

        
    

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small>Author</small>
                        </h1>
                       
                        <div class="col-xs-6">
                            <?php inset_categories(); ?>
                            
                            
                           
                            
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Add Categories</label>
                                    <input type="text" class="form-control" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="categories" value="Add Categories">
                                </div>
                            </form>
                            
                            
                            
                             <form action="" method="post"> 
                                <div class="form-group">
                                    <label for="cat-title">Edit Categories</label>
                                    
                                    <?php 
                                    if(isset($_GET['edit'])){
                                        $cat_id = $_GET['edit'];
                                        $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
                                            $select_categories_id = mysqli_query($connection,$query);
                                            while($row = mysqli_fetch_assoc($select_categories_id)){
                                            $cat_id = $row['cat_id'];
                                            $cat_title = $row['cat_title'];
                                            
                                  
                                    ?>
                                     <input value="<?php if(isset($cat_title)){echo $cat_title;}?>" type="text" class="form-control" name="cat_title">

                                    
                                  <?php  }} ?>
                                    
                                    
                                    
                                    <?php 
                                    
                                        if(isset($_POST['editcategories'])){
                                            $the_cat_title = $_POST['cat_title'];
                                            $query = "UPDATE categories SET  cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id}";
                                            $update_query = mysqli_query($connection,$query);
                                            header("Location: categories.php");
                                        }
                                    ?>
<!--                                    //<input type="text" class="form-control" name="cat_title">-->
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="editcategories" value="Update Categories">
                                </div>
                            </form>
                            
                            
                            
                            
                        </div>
                        
                        
                        
                        <div class="col-xs-6">
                      
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Categories Title</th>
                                        <th>Action</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php //FIND ALL CATEGORIES QUERY
                                            $query = "SELECT * FROM categories";
                                            $select_categories = mysqli_query($connection,$query);
                                            while($row = mysqli_fetch_assoc($select_categories)){
                                            $cat_id = $row['cat_id'];
 
                                            $cat_title = $row['cat_title'];
                                            echo "<tr><td>{$cat_id}</td>";
                                            echo "<td>{$cat_title}</td>";        
                                            echo "<td><a href ='categories.php?delete={$cat_id}'>Delete</a></td>";
                                            echo "<td><a href ='categories.php?edit={$cat_id}'>Edit</a></td>";

                                            echo "</tr>";
 
                                            }
                                ?>
                                 
                                    <?php 
                                    
                                       delete_categories();
                                    ?>
                                </tbody>
                            </table>
                            
                        </div>
                        
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include "includes/footer.php" ?>