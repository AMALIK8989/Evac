<?php
$servername ='localhost';
$username='root';
$password='';
$dbname='evac1';

$con=mysqli_connect($servername,$username,$password,$dbname);
if($con){
    // echo "connection successful...";

}
else{
    echo "no connection";
}