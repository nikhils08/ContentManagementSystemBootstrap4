<?php 

if(isset($_GET['onlineusers'] ) ){
    session_start();    
    include_once("../includes/db.php");
    checkUserSession();
}

function confirmQuery($result) {
    global $connection;
    if(!$result) {
            die("Query Failed : " . mysqli_error( $connection ) );
    }
}

function checkUserSession(){
    global $connection;
    //managing users online feature
        $session = session_id();
        $user_id = $_SESSION['user_id'];

        $time_out_in_seconds = 60;
        $time = time();
        $time_out  = $time - $time_out_in_seconds;

        $query = "SELECT * FROM users_online WHERE session = '$session'";
        $user_exists = mysqli_query($connection, $query);
        confirmQuery($user_exists);
        if(mysqli_num_rows($user_exists) == 0){
            $query = "INSERT INTO users_online(session, time, user_id) VALUES('$session', '$time', $user_id)";
            $insert_query = mysqli_query($connection, $query);
            confirmQuery($insert_query);
        } 
        /*else{
            //making provisionn to auto log out if no activity conducted
            $query = "UPDATE users_online SET time = '$time' WHERE session = '$session'";
            $update_query = mysqli_query($connection, $query);
            confirmQuery($update_query);
        }*/

        $query = "SELECT * FROM users_online WHERE time > $time_out";
        $online_user_query = mysqli_query($connection, $query);
        $online_user_count = mysqli_num_rows($online_user_query);
    
        echo $online_user_count;
}

function checkUser(){
    if(!isset($_SESSION['username'] ) ) {
            die ("<h3 style = 'color: red'> You have not logged in please Login from <a href = '../index.php'>here</h3>");
    }else{
            $username = $_SESSION['username'];
            return $username;
    }
}


function editCategory(){
    global $connection;
    
    if( isset($_POST['edit_submit'] ) ) {
        $input_cat_title = $_POST['cat_title'];
        $input_cat_id = $_GET['edit'];

        if( $input_cat_title == "" || empty($input_cat_title) ) {
            echo "<h5 class = 'text-danger'>&#42;Please insert category title and then try</h5>";
        }

        else {
            $query = "UPDATE categories SET cat_title = '$input_cat_title' where cat_id = '$input_cat_id'";
            $update_cat_query = mysqli_query($connection, $query);
            if ( !$update_cat_query ) {
            die("Query Failed " . mysqli_error($connection));
            }
            header("Location: categories.php");
        }
    }
}


function addCategory(){
    global $connection;
    
    if( isset($_POST['submit'] ) ) {
        $input_cat_title = $_POST['cat_title'];
        if( $input_cat_title == "" || empty($input_cat_title) ) {
            echo "<h5 class = 'text-danger'>&#42;Please insert category title and then try</h5>";
        }
        else {
            $query = "INSERT INTO categories(cat_title) ";
            $query .= "VALUE('$input_cat_title')";
            $add_cat_query = mysqli_query($connection, $query);
            if ( !$add_cat_query ) {
                die("Query Failed " . mysqli_error($connection));
            }
            header("Location: categories.php");
        }
    }
}

function fetchCategoryForEdit(){
    
    global $connection;
    
    if( isset( $_GET['edit'] ) ) {
        $edit_cat_id = $_GET['edit'];
        $query = "SELECT * FROM categories WHERE cat_id = $edit_cat_id";
        $edit_category_title_query = mysqli_query($connection, $query);
        if($row = mysqli_fetch_assoc($edit_category_title_query)){
            $edit_cat_title = $row['cat_title'];
            return $edit_cat_title;
        }
    }   
}

?>