<?php
class db_driver{
    
    public $dbQuery = NULL;
    public $dbCon = NULL;
    
    public function __construct() {
       $config = include dirname(__DIR__)."/config.php";
       $this->connect($config);
    }
    //connect to database
    public function connect($config){
        try {
            
            $this->dbCon = new PDO("mysql:host=".$config['hostName'].";port=".$config['dbport'].";dbname=".$config['dbName'].";charset=".$config['charSet'],$config['userName'],$config['passWord']);
        }
        catch(PDOException $pe){
            echo $pe->getMessage();
        }
    }
    //return query data
    public function query($sql, $activity_type = null){
            $this->saveLogQuery($sql,$activity_type);
            return $this->dbQuery=$this->dbCon->query($sql);
    }
    public function querySelects($sql){
            // $this->saveLogQuery($sql,$activity_type);
            return $this->dbQuery=$this->dbCon->query($sql);
    }
    //return count row of query
    public function numRows(){
        return (int)$this->dbQuery->rowCount();
    }
    //return array row of query
    public function fetchAssoc(){
        return $this->dbQuery->fetchAll(PDO::FETCH_ASSOC);
    }
    //return last insert
    public function insert_id(){
        return $this->dbCon->lastInsertId();
    }


    public function saveLogQuery($executed_query = NULL, $activity_type = NULL)
    {
        $username = $_SESSION['user'][0]['expo_users_name'];
        $user_id = $_SESSION['user'][0]['expo_users_ID'];
        $return_url = $_SERVER['REQUEST_URI'];
        $user_key = $_SESSION['user'][0]['expo_users_email'];
        $request_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $user_ip_address = $_SERVER['REMOTE_ADDR'];
        $executed_query= $executed_query;
        $activity_type= $activity_type;

        try {


            $queryA = "INSERT INTO log_activities (
                `query`, `username`, `user_id`, `return_url`, `user_key`, `request_url`, `user_ip_address`, `activity_type`)
                VALUES (
\"$executed_query\", '$username', '$user_id', '$return_url', '$user_key', '$request_url', '$user_ip_address', '$activity_type'
             ) ";
           $this->dbQuery=$this->dbCon->query($queryA);






        } catch (Exception $e) {

            echo 'Fout: ', $e->getMessage(), "\n";

        }
    }
}
