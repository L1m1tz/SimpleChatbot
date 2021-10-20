<?php
// connectiong to database
$conn = msqli_connect("localhost", "root", "password", "bot") or die("Database Error");

//getting user message through ajax

$getMesg = mysqli_real_escape_string($conn, $_POST['text']);

//checking user query to database query
$check_data = "SELECT replies FROM chatbot WHERE queries LIKE '%$getMesg%'";
$run_query = mysqli_query($conn, $check_data) or die('Error');

//if user query matched to database query we'll show the reply otherwise it hits the else statement

if(mysqli_num_rows($run_query) > 0){
    //fetching reply from the database according to the user query
    $fetch_data = mysqli_fetch_assoc($run_query);
    //storing reply to variable which we wil send to ajax
    $reply = $fetch_data['replies'];
    echo $reply;
}
else{
 echo "Sorry unable to understand what you typed!";
}
