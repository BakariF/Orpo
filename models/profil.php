<?php
class profil
{
    private $table = 'g5e1d_users';
    private $dbPrefix = 'g5e1d_';
    public $id = 0;
    public $name = '';
    public $mail = '';
    public $password = '';
    public $id_roles = 0;
    public $registerDate = '1900-01-01';
    private $db = NULL;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=' . SQL_HOST . ';dbname=' . SQL_DBNAME . ';charset=utf8', SQL_USER, SQL_PWD);
        } catch (Exception $error) {
            die($error->getMessage());
        }
    }
    public function getUserProfile()
    {
        $getUserProfile = $this->db->prepare(
            'SELECT `mail`, `name`, `registerDate`
        FROM ' . $this->table
                . ' WHERE `mail` = :mail'
        );
        $getUserProfile->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $getUserProfile->execute();
        return $getUserProfile->fetch(PDO::FETCH_OBJ);
    }
}