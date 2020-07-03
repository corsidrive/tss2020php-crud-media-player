<?php
class Account {

    private $id;
    private $username;
    private $password;
    private $email;


    public function __construct() {
        $this->model = new AccountModel(Db::getInstance());
    }
    
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

   
    public function save()
    {
        if(!$this->id){
            $this->model->create($this);
        }else{
            $this->model->update($this);
        }
    }


    public function setPasswordHash($password)
    {
        $this->password = password_hash($password,PASSWORD_BCRYPT);
    }

    public function getPasswordHash()
    {
        return $this->password;
    }


}