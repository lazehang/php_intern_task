<?php
include 'vendor/autoload.php';

if(isset($_GET['id']))
{
 $id=$_GET['id'];
 $delete = (new \Classes\User())->delete($id);
 
  header('location:list.php');
}