<?php


include 'vendor/autoload.php';
$email_err = '';


if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $users = (new Classes\User())->getOne($id);
    foreach ($users as $user) {
    }
    $Edit = isset($users) ? true : false;
}

if(isset($_POST['submit'])){
     $id = $_GET['id'];
    $email = $_POST['email'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];

    $users = (new Classes\User())->checkEmail($email);

    //if the user enters email that is already stored in db
    if($users){
        
        //if $Edit is not empty
        if(!EMPTY($Edit)){
        
            //if the entered email is equal to the email from the selected row
            if($email == $user->getEmail()){

            $user = new \Classes\User();
            $user->setFirstName($firstName);
            $user->setEmail($email);
            $user->setLastName($lastName);
                if ($user->update($id)) {
                    header('location:list.php');
                }
           }else {
                $email_err = "<p>Same email already exists !! Please enter a unique email</p>";
            }    
        }
        else{
                $email_err = "<p>Same email already exists !! Please enter a unique email</p>";
        }
    } else {

        //if $Edit is not empty
        if(!EMPTY($Edit)){       

            $user = new \Classes\User();
            $user->setFirstName($firstName);
            $user->setEmail($email);
            $user->setLastName($lastName);
                if ($user->update($id)) {
                    header('location:list.php');
                }
            }

        else {  
            $user = new \Classes\User();
            $user->setFirstName($firstName);
            $user->setEmail($email);
            $user->setLastName($lastName);
                if ($user->insert()) {
                    header('location:list.php');
                }
        }
    }
}
?>
<html>
<head>
    <title>User Crud</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="row">
         
         
            
            

        <form action="" id="form" class="form" role="form" method="post" style="margin-top:2%">
            <div class="col-md-12 col-sm-12 col-xs-12" >
           
            <?php if (!EMPTY($Edit)){?>
                    <h1 style="display:inline">Edit User</h1>
            <?php } else{?>
                    <h1 style="display:inline">Add User</h1>
            <?php } ?>
        
          
            <a href="list.php">View Users</a>
           
         </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" title="Enter a valid email" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required value="<?php
                if(!EMPTY($Edit) ){

                    echo $user->getEmail();
                    
                }
                ?>">

                 <span class="text-danger"><?php echo $email_err; ?></span>

            </div>
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" pattern="^[a-zA-Z]*" required value="<?php
                if(!EMPTY($Edit)){
                    echo $user->getFirstName();
                }
                ?>">
               
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" pattern="^[a-zA-Z]*" required value="<?php
                if(!EMPTY($Edit)){
                    echo $user->getLastName();
                }
                ?>">
            </div>
            <div class="form-group">
                <button class="btn btn-success" name="submit" role="submit"><?php if(!EMPTY($Edit)){ echo 'Update';}else {
                    echo 'Save';}?></button> 
            </div>
        </form>
        
    </div>
</div>


</body>
</html>