<?php
$servername ='localhost';
$username='root';
$password='';
$dbname='evac';

$con=mysqli_connect($servername,$username,$password,$dbname);
if($con){
    // echo "connection successful...";

}
else{
    echo "no connection";
}