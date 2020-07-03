<?php
class AccountModel {

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function create(Account $account)
    {

        $stm = $this->pdo->prepare("INSERT INTO accounts
                                    (username, password, email)
                                    VALUES ( :username, :password, :email);");
                                    
        $stm->bindValue(':username',$account->getUsername());
        
        //TODO
        //$stm->bindValue(':password',$account->getPasswordHash());
        $stm->bindValue(':email',$account->getEmail());

        $stm->execute();
    }

    public function readOne($id)
    {
        $stm = $this->pdo->prepare('SELECT * FROM accounts where id = :id;');
        $stm->bindValue(':id',$id);
        $stm->execute();
        $res = $stm->fetchAll(PDO::FETCH_CLASS,'Account');
        
        return count($res) > 0 ?  $res[0] : null ;
    }

    public function readAll($page=1,$itemsForPage=10)
    {
        $stm = $this->pdo->prepare('SELECT * FROM accounts ;');
        $stm->execute();
        $res = $stm->fetchAll(PDO::FETCH_CLASS,'Account');
        
        return count($res) > 0 ?  $res[0] : null ;
    }
    
    public function update(Account $account)
    {
        $stm = $this->pdo->prepare('UPDATE  accounts
                                            SET username=:username,
                                            password=:password,
                                            email=:email
                                            
                                            WHERE id=:id;');
        
        $stm->bindValue(':username',$account->getUsername(),PDO::PARAM_STR);
        $stm->bindValue(':password',$account->getPasswordHash(),PDO::PARAM_STR);
        $stm->bindValue(':email',$account->getEmail(),PDO::PARAM_STR);
        $stm->bindValue(':id',$account->getId(),PDO::PARAM_INT);

        $stm->execute();
        return $stm->rowCount();
    }
    
    public function delete($id)
    {
        
    }

    public function usernameExists($username):?Account
    {
        $stm = $this->pdo->prepare('SELECT * FROM accounts where username=:username;');
        $stm->bindValue(':username',$username,PDO::PARAM_STR);
        $stm->execute();
        
        $res = $stm->fetchAll(PDO::FETCH_CLASS,'Account');
        return count($res) === 1 ? $res[0] : null; 
    }
    
   

   

    
}

