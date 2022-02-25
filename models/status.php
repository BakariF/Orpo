<?php
class status
{
    private $table = 'g5e1d_projectstatus';
    private $dbPrefix = 'g5e1d_';
    public $id = 0;
    public $name = '';
    private $db = NULL;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=' . SQL_HOST . ';dbname=' . SQL_DBNAME . ';charset=utf8', SQL_USER, SQL_PWD);
        } catch (Exception $error) {
            die($error->getMessage());
        }
    }
    public function getStatus()
    {
        // query = requête immédiate
        $showStatus = $this->db->query(
           'SELECT `name`, `id`
            FROM `g5e1d_projectstatus`'
        );
        return $showStatus->fetchAll(PDO::FETCH_OBJ);
    }
}