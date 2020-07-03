<?php
class UserSession {


    public function logIn($username,$password):?Account
    {
        $accountModel = new AccountModel(Db::getInstance());
        $account = $accountModel->usernameExists($username);

        if(!$account == NULL && password_verify($password,$account->getPasswordHash())){
            //verificare la password
            $_SESSION['account'] = ['username' => $account->getUsername(),'email'=>$account->getEmail()];
            $_SESSION['is_logged'] = true;
            //echo "PASSWORD ok\n\n";
            return $account;
        }else{
            // unset($_SESSION['account']); 
            $_SESSION['account'] =  NULL;
            $_SESSION['is_logged'] = false;
            return null;
        }

    }

    public function logOut()
    {
        $_SESSION['account'] =  NULL;
        $_SESSION['is_logged'] = false;
        // session_destroy();
    }

    public function getCurrentAccount():?Account
    {
       return $_SESSION['account'];
    }
}