<?php

namespace Classes;

class User extends DB
{
    private $firstName;
    private $lastName;
    private $email;
    private $id;


/**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

/**
     * @param mixed $firstName
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function insert()
    {
        $query = "insert into users(email,first_name, last_name) 
            values(
            '".$this->getEmail()."',
            '".$this->getFirstName()."',
            '".$this->getLastName()."'
            )";

        return mysqli_query($this->db, $query);
    }

    public function getAll()
    {
        $query = 'select * from users';
        $result = mysqli_query($this->db, $query);
        $users = [];
        if (mysqli_num_rows($result) > 0) {
            while ($user = mysqli_fetch_assoc($result)) {
                $thisUser = new self();
                $thisUser->setId($user['id']);
                $thisUser->setFirstName($user['first_name']);
                $thisUser->setLastName($user['last_name']);
                $thisUser->setEmail($user['email']);
                $users[] = $thisUser;
            }
        }

        return $users;
    }

    //Delete function
     public function delete($id)
     {
      $delete = mysqli_query($this->db, "Delete from users where id = '$id'");

      return $delete;
     }

     //select one particular row function using id
     public function getOne($id)
    {
        $query = "select * from users where id = '$id'";
        $result = mysqli_query($this->db, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($user = mysqli_fetch_assoc($result)) {
                $thisUser = new self();
          
                $thisUser->setFirstName($user['first_name']);
                $thisUser->setLastName($user['last_name']);
                $thisUser->setEmail($user['email']);
                $users[] = $thisUser;
            }
        }

        return $users;
    }

    //update function
     public function update($id)
    {
        $query = "update users set email =  '".$this->getEmail()."', first_name = '".$this->getFirstName()."', last_name = '".$this->getLastName()."' where id = '$id' ";

        return mysqli_query($this->db, $query);
    }

    //email validation function
    public function checkEmail($email){

        $query = "select * from users where email = '$email'";
        $result = mysqli_query($this->db, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($user = mysqli_fetch_assoc($result)) {
                $thisUser = new self();
          
                $thisUser->setFirstName($user['first_name']);
                $thisUser->setLastName($user['last_name']);
                $thisUser->setEmail($user['email']);
                $users[] = $thisUser;
            }
        }

        return $users;
    }
   
}
