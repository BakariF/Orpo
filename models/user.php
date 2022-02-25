<?php
// la classe est un modèle de données définissant la structure commune à tous les objets qui seront créés à partir d'elle.
// private: accessible uniquement dans la classe.
// protected: accessible dans la class et les enfants.
// public: disponible dans la classe, les enfants et dans les instances.
class user
{
    private $table = 'g5e1d_users';
    private $dbPrefix = 'g5e1d_';
    public $id = 0;
    public $username = '';
    public $mail = '';
    public $phoneNumber = '';
    public $password = '';
    public $id_roles = 0;
    private $db = NULL;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=' . SQL_HOST . ';dbname=' . SQL_DBNAME . ';charset=utf8', SQL_USER, SQL_PWD);
        } catch (Exception $error) {
            die($error->getMessage());
        }
    }

    public function addUser()
    {
        $addUser = $this->db->prepare(
            'INSERT INTO ' . $this->table . ' (`name`, `mail`, `phoneNumber`, `password`, `id_g5e1D_roles`)
            VALUES (:name, :mail, :phoneNumber, :password, 2)'
        );
        $addUser->bindValue(':name', $this->name, PDO::PARAM_STR);
        $addUser->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $addUser->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $addUser->bindValue(':password', $this->password, PDO::PARAM_STR);
        return $addUser->execute();
    }

    public function getHashByMail($option = '')
    {
        $isOk = true;
        if ($option == 'mail') {
            $where = 'WHERE `mail` = :mail';
        } else {
            $where = 'WHERE `id` = :id';
        }
        $getHash = $this->db->prepare(
            'SELECT `password`
            FROM ' . $this->table . (isset($where) ? ' ' . $where : '')
        );
        if ($option == 'mail') {
            $getHash->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        } else {
            $getHash->bindValue(':id', $this->id, PDO::PARAM_INT);
        }
        /* if (!$getHash->execute()) {
            $isOk = false;
        } else { */
            $getHash->execute();
            $result = $getHash->fetch(PDO::FETCH_OBJ);
           /*  $this->password = $result->password; */
            if(is_object($result)){
                // de cet objet je prends que le password else retourne lol
                return $result->password;
        } else {
            return '';
        /* return $isOk; */
    }
}
    /**
     * Méthode permettant de récupérer les différentes infos d'un utilisateur
     *
     * @return object
     */
    public function getUserInfo($option = '')
    {
        $isOk = true;
        if ($option == 'mail') {
            $where = 'WHERE `mail` = :mail';
        } else {
            $where = 'WHERE `id` = :id';
        }
        $query = $this->db->prepare(
            'SELECT `id`, `username`, `mail`, `registerDate`, `id_roles` AS `role`
            FROM ' . $this->table . (isset($where) ? ' ' . $where : '')
        );
        if ($option == 'mail') {
            $query->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        } else {
            $query->bindValue(':id', $this->id, PDO::PARAM_INT);
        }
        if (!$query->execute()) {
            $isOk = false;
        } else {
            $result = $query->fetch(PDO::FETCH_OBJ);
            $this->id = $result->id;
            $this->username = $result->username;
            $this->mail = $result->mail;
            $this->role = $result->role;
        }

        return $isOk;
    }

    public function checkIfUserExist($option = '')
    {
        $isOk = true;
        if ($option == 'mail') {
            $where = 'WHERE `mail` = :mail';
        } else if ($option == 'username') {
            $where = 'WHERE `username` = :username';
        } else {
            $where = 'WHERE `id` = :id';
        }
        $query = $this->db->prepare(
            'SELECT COUNT(`id`) AS `number`
            FROM ' . $this->table . (isset($where) ? ' ' . $where : '')
        );
        if ($option == 'mail') {
            $query->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        } else if ($option == 'username') {
            $query->bindValue(':username', $this->username, PDO::PARAM_STR);
        } else {
            $query->bindValue(':id', $this->id, PDO::PARAM_INT);
        }
        if (!$query->execute()) {
            $isOk = false;
            return $isOk;
        } else {
            $result = $query->fetch(PDO::FETCH_OBJ);
            return $result->number;
        }
    }

    //modification de l'user
    public function modifyName()
    {
        // Faire une requête PREPARE et EXECUTE et bindValue protége de l'injection SQL
        $modifyUsers = $this->db->prepare(
            'UPDATE ' . $this->table . ' 
        SET `name` = :name 
        WHERE `id` = :id'
        );
        $modifyUsers->bindValue(':name', $this->name, PDO::PARAM_STR);
        $modifyUsers->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $modifyUsers->execute();
    }
    //Méthode permettant de modifier le profil d'un utilisateur
    public function modifyMail()
    {
        $modifyUserMail = $this->db->prepare(
            'UPDATE ' . $this->table . ' 
        SET `mail` = :mail
        WHERE `id` = :id'
        );
        $modifyUserMail->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $modifyUserMail->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $modifyUserMail->execute();
    }
    //Méthode permettant de modifier le profil d'un utilisateur
    public function modifyPassword()
    {
        $modifyUserMail = $this->db->prepare(
            'UPDATE ' . $this-> table . ' 
        SET `password` = :password
        WHERE `id` = :id'
        );
        $modifyUserMail->bindValue(':password', $this->password, PDO::PARAM_STR);
        $modifyUserMail->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $modifyUserMail->execute();
    }
    public function modifyPhoneNumber()
    {
        $modifyUserMail = $this->db->prepare(
            'UPDATE ' . $this-> table . ' 
        SET `phoneNumber` = :phoneNumber
        WHERE `id` = :id'
        );
        $modifyUserMail->bindValue(':password', $this->password, PDO::PARAM_STR);
        $modifyUserMail->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $modifyUserMail->execute();
    }
    //Méthode permettant de supprimer le profil d'un utilisateur
    public function deleteProfile()
    {
        $deleteUsers = $this->db->prepare(
            'DELETE FROM `g5e1d_users`
        WHERE `id` = :id'
        );
        $deleteUsers->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $deleteUsers->execute();
    }
}
