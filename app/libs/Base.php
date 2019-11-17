<?php

session_start();

class Base
{

    protected $host = HOST;
    protected $dbname = DBNAME;
    protected $user = USER;
    protected $pass = PASS;

    private $cnx;
    private $stmt;
    private $error;

    public function __construct()
    {
        $dbh = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

        $options = [
            PDO::ATTR_ERRMODE => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->cnx = new PDO($dbh, $this->user, $this->pass, $options);
            $this->cnx->exec('set names utf8');
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function query($sql)
    {
       return $this->stmt = $this->cnx->prepare($sql);
    }

    public function bind($params, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;

                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;

                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;

                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }

        return $this->stmt->bindValue($params, $value, $type);
    }

    public function execute()
    { 
        return $this->stmt->execute();
    }

    public function registers()
    { 
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function register()
    { 
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    public function row()
    { 
        $this->execute();
        return $this->stmt->rowCount();
    }
}
