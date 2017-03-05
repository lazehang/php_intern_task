<?php


include 'vendor/autoload.php';
$users = (new Classes\User())->getAll();



?>

<html>
<head>
    <title>User Crud</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            
        </div>
    </div>
<div class="container">
    <div class="row">
        <h1>User List</h1>

        <a href="index.php"><button class="btn btn-success">Add User</button></a>
        <table class="table">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user->getFirstName(); ?></td>
                    <td><?php echo $user->getLastName(); ?></td>
                    <td><?php echo $user->getEmail(); ?></td>
                    <td><a href="index.php?id=<?php echo $user->getId() ?>"><button class="btn btn-sm btn-primary">Edit</button></a> <a href="delete.php?id=<?php echo $user->getId(); ?>"><button class="btn btn-sm btn-danger">Delete</button></a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
</body>
</html>
