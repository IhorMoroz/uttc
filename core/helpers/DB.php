<?php

namespace core\helpers;

use core\exceptions\DataBase;
use core\traits\Singleton;

class DB
{
    use Singleton;

    private $_DB;

    public function query(string $sql)
    {
        return $this->_DB->query($sql);
    }

    public function execute(string $sql, array $execute)
    {
        $qst = $this->_DB->prepare($sql);
        $res = $qst->execute($execute);
        if($res) return true;
        return false;
    }

    public function prepareQuery(string $sql, array $execute = [], string $class = "stdClass")
    {
        $qst = $this->_DB->prepare($sql);
        $res = $qst->execute($execute);
        if($res) return $qst->fetchAll(\PDO::FETCH_CLASS, $class);
        return null;
    }

    private function __construct()
    {
        try{
            $config = parse_ini_file(__DIR__."/../../config.ini", true);
            $this->_DB = new \PDO('mysql:host='.$config['database']['host'].';dbname='.$config['database']['name'], $config['database']['user'], $config['database']['password']);
        }catch (\PDOException $e){
            throw new DataBase($e->getMessage());
        }
    }
}