## Pagevamp PHP Intern Task

We are looking for interns that can grow with us. We are strong believers of Object Oriented Programming.
  
### Test

We have devised a task to check you extent of knowledge in OOP. 
We have added code required to make a CRUD(Create, Read, Update and Delete) application. You will need to add few features to this.

### Setup

* `git clone https://github.com/pagevamp/php-intern-task.git`
* `cd php-intern-task && composer install`
* Create a database named `pagevamp_task`
* Change the credentials of your database in `Classes/DB.php` to connect to mysql
* Create a table `users` with columns `id`, `first_name`, `last_name` and `email`.
* Either create a virtual host or go to `localhost/php-intern-task` in your browser

### Tasks

We have completed the add and list user part. You need to

* Add relevant buttons everywhere. for example: add user button in user list page
* Add Edit and Delete button on the right of `Email` column.
* Create an edit page where user can edit the user they selected
* Create delete functionality

### Questions

* Attributes firstName, lastName and email in User.php are private, What does that mean?
* Class DB is an abstract class. What does that mean? and why do you think it is used?

### For bonus points
* Add validation to the form (client side and server side)
* Add a message field and make changes in all relevant places




