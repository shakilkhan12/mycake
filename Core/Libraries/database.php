<?php

namespace Core\Libraries;


class Database
{
    private $db;
    public $result;
    public function __construct()
    {
        // $whoops = new \Whoops\Run;
        // $whoops->prependHandler(new \Whoops\Handler\PrettyPageHandler);
        // $whoops->register();
        try {
            $this->db = new \PDO("mysql:host=" . host . ";dbname=" . databaseName . "", userName, password);
            // echo "con";
            // return $this->db;
        } catch (PDOException $e) {

            return "Connection Error: " . $e->getMessage();
        }
    }

    public function get($tableName)
    {

        $this->result = $this->db->prepare("SELECT * FROM users");
        $this->result->execute();
        return $this;
    }

    public function all()
    {
        return $this->result->fetchAll(\PDO::FETCH_OBJ);
    }
}
