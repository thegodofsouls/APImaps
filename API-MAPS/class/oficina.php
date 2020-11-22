<?php
    class Oficina{
        
        //atributos
        private $id;
        private $name;
        private $address;
        private $type;
        private $lat;
        private $lng;
        private $conn;
        private $tableName = 'tbl_map';
       

        function setId($id){
            $this->id = $id;
        }

        function getId(){
            return $this->id;
        }

        function setName($name)
        {
            $this->name = $name;
        }

        function getName()
        {
            return $this->name;
        }

        function setAddress($address){
            $this->address = $address;
        }

        function getAddress(){
            return $this->address;
        }

        function setType($type){
            $this->type = $type;
        }

        function getType(){
            return $this->type;
        }

        function setLat($lat){
           $this->lat = $lat;
        }

        function getLat(){
            return $this->lat;
        }

        function setLng($lng)
        {
            $this->lng = $lng;
        }

        function getLng(){
            return $this->lng;
        }

        //método contrutor
        public function __construct()
        {
            //chamando a conexao
             require_once('class/dbconnect.php');
             $conn = new DbConnect(); //instanciando a classe de conexao
             $this->conn = $conn->connection(); 
        }

        public function getOficinasLatLng()
        {
            $sql = "SELECT * FROM $this->tableName WHERE lat IS NULL AND lng IS NULL";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getAllOficinas()
        {
            $sql = "SELECT * FROM $this->tableName";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); 
        }

        public function updateOficinasLatLng()
        {
             $sql = "UPDATE $this->tableName SET lat = :lat, lng = :lng WHERE id = :id";
             $stmt = $this->conn->prepare($sql);
             $stmt->bindParam(':lat', $this->lat);
             $stmt->bindparam(':lng', $this->lng);
             $stmt->bindparam(':id', $this->id);

             if($stmt->execute())
             {
                 return true;
             }
             else
             {
                 return false;
             }
        }

}