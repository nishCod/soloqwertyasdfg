<?php


function inset_categories(){
    if(isset($_POST["categories"]))
    {
        $cat_title = $_POST["cat_title"];
        if($cat_title == "" || empty($cat_title)){
            echo "this field should not be empty";
        }else{
            $query = "INSERT INTO categories(cat_title)";
            $query .= "VALUE('$cat_title')";
            $create_categories_query = mysqli_query($connection,$query);
            if(!$create_categories_query){
                die("QUERY FAILED" . mysqli_error($connection));
            }
        }
    }
}



function delete_categories(){
     if(isset($_GET['delete'])){
        $the_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
        $delete_query = mysqli_query($connection,$query);
        header("Location: categories.php");
    }
}


?>