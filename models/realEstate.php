<?php
class project
{
    private $table = 'g5e1d_roles';
    private $dbPrefix = 'g5e1d_';
    public $id = 0;
    public $address = '';
    public $price = 0;
    public $description = '';
    public $livingArea = 0;
    public $landArea = 0;
    public $livingRoomArea = 0;
    public $roomNumber = 0;
    public $bedroomNumber = 0;
    public $bathroomNumber = 0;
    public $toiletNumber = 0;
    public $floorNumber = 0;
    public $garage = 0;
    public $parking = 0;
    public $constructionYear = '';
    public $worksToBeDone = 0;
    public $GES = 0;
    public $DPE = 0;
    public $archived = false;
   // public $dateCreation = ;
    public $id_g5e1D_typeOfRealEstate = 0;
    public $id_g5e1D_typeOfWaterEvacuation = '';
    public $id_g5e1D_cities = 0;
    public $id_g5e1D_status = 0;
    private $db = NULL;
    // table a refaire !!!

    public function __construct()
    {
        try {
            include '../config.php';
            $this->db = new PDO('mysql:host=' . SQL_HOST . ';dbname=' . SQL_DBNAME . ';charset=utf8', SQL_USER, SQL_PWD);
        } catch (Exception $error) {
            die($error->getMessage());
        }
    }

    public function addProject()
    {
        //on fait une requête préparée.
        $addProjects = $this->db->prepare(
            //Marqueur nominatif genre :birthDate
            //$this-> : permet d'acceder aux attributs de l'instance qui est en cours.
            'INSERT INTO ' . $this->table . ' (`address`, `price`, `description`,`livingArea`,`landArea`,`livingRoomArea`, `roomNumber`, `bedroomNumber`, `bathroomNumber`, `toiletNumber`, `floorNumber`, `garage`,`parking`,`constructionYear`,`worksToBeDone`,`GES`,`DPE`,`worksToBeDone`,`id_g5e1D_typeOfRealEstate`,`id_g5e1D_typeOfWaterEvacuation`,`id_g5e1D_cities`,`id_g5e1D_status`, )
            VALUES(:address, :price, :description, :livingArea, :landArea, :livingRoomArea, :roomNumber, :bedroomNumber, :bathroomNumber, :toiletNumber)'
        );
        $addProjects->bindValue(':address', $this->address, PDO::PARAM_STR);
        $addProjects->bindValue(':price', $this->price, PDO::PARAM_INT);
        $addProjects->bindValue(':description', $this->description, PDO::PARAM_STR);
        $addProjects->bindValue(':livingArea', $this->livingArea, PDO::PARAM_STR);
        $addProjects->bindValue(':landArea', $this->landArea, PDO::PARAM_INT);
        $addProjects->bindValue(':livingRoomArea', $this->livingRoomArea, PDO::PARAM_STR);
        $addProjects->bindValue(':bedroomNumber', $this->bedroomNumber, PDO::PARAM_STR);
        $addProjects->bindValue(':bathroomNumber', $this->bathroomNumber, PDO::PARAM_INT);
        $addProjects->bindValue(':toiletNumber', $this->toiletNumber, PDO::PARAM_INT);

        //lance la requête
        return $addProjects->execute();
    }

    public function showCreations()
    {
        $addProjects = $this->db->prepare(
            'SELECT `address`,`livingArea`,`description`,`livingRoomArea`,`landArea`,`price`
            FROM `g5e1d_projects`
            WHERE `address` = :address AND `livingArea` = :livingArea AND `description` = :description AND `landArea` = :landArea AND `price` = price AND `livingRoomArea` = :livingRoomArea
        '
        );
        $addProjects->bindValue(':address', $this->address, PDO::PARAM_STR);
        $addProjects->bindValue(':livingArea', $this->livingArea, PDO::PARAM_STR);
        $addProjects->bindValue(':description', $this->description, PDO::PARAM_STR);
        $addProjects->bindValue(':landArea', $this->landArea, PDO::PARAM_INT);
        $addProjects->bindValue(':price', $this->price, PDO::PARAM_INT);
        $addProjects->bindValue(':livingRoomArea', $this->livingRoomArea, PDO::PARAM_STR);
        $addProjects->execute();
        //fetchAll retourne un tableau contenant tous les resultats
        return $addProjects->fetchAll(PDO::FETCH_OBJ);
    }
    /*public function modifyCreations()
    {
        $updateProjects = $this->db->prepare(
            'UPDATE `` 
            SET (:, :, :, :, :, :, :, :, :)
            WHERE `` = :;'
        );
        $updateProjects->bindvalue(':', $this-> , PDO::PARAM_INT);
        return $updateProjects->execute();
    }
    public function deleteCreations()
    {
        $deleteProjects = $this->db->prepare(
            'DELETE FROM ``
            WHERE `` = :'
        );
        $deleteProfile->bindvalue(':', $this->, PDO::PARAM_INT);
        return $deleteProfile->execute();
    }*/
}