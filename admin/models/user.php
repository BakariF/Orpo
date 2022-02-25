<?php
class admin
{
    public $id = 0;
    public $username = '';
    public $mail = '';
    private $table = '`g5e1d_users`';
    public $password = '';
    public $id_g5e1d_roles = 0;
    private $db = NULL;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=' . SQL_HOST . ';dbname=' . SQL_DBNAME . ';charset=utf8', SQL_USER, SQL_PWD);
        } catch (Exception $error) {
            die($error->getMessage());
        }
    }

    public function getNewUsers()
    {
        $getNewUsers = $this->db->query('SELECT id, username, mail, DATE_FORMAT(registerDate, "%d/%m/%Y") AS registerDate
            FROM g5e1d_users
            ORDER BY registerDate
            LIMIT 10 OFFSET 0');
        return $getNewUsers->fetchAll(PDO::FETCH_OBJ);
    }
}
