<?php

namespace core\models;


use core\helpers\DB;

abstract class Model
{
    const TABLE = "";

    /**
     * @return array objects
     */
    static public function getAll() : Array
    {
        return DB::getInstance()->prepareQuery("SELECT * FROM ".static::TABLE,[],static::class);
    }

    /**
     * @param int $id
     * @return object
     */
    static public function getOne(int $id)
    {
        return DB::getInstance()->prepareQuery("SELECT * FROM ".static::TABLE." WHERE id = :id",
            ['id' => $id],
            static::class)[0];
    }

    /**
     *
     */
    public function save()
    {
        if(isset($this->id) && (int)$this->id >= 1) $this->update();
        else $this->insert();
    }

    /**
     * @return boolean
     */
    public function delete()
    {
        if(isset($this->id) && (int)$this->id >= 1){
            $sql = "DELETE FROM ".static::TABLE." WHERE id = :id";
            return DB::getInstance()->execute($sql, [":id" => (int)$this->id]);
        }
    }

    /**
     * @return boolean
     */
    private function insert()
    {
        $keys = [];
        $values = [];
        foreach($this as $k => $v){
            if($k == "id") continue;
            $keys[':'.$k] = $k;
            $values[':'.$k] = $v;
        }
        $sql = "INSERT INTO ". static::TABLE ." (". implode(',', array_values($keys)) .")VALUES(". implode(',', array_keys($keys)) .")";
        return DB::getInstance()->execute($sql, $values);
    }

    /**
     * @return boolean
     */
    private function update()
    {
        $colums = [];
        $values = [];
        foreach($this as $k => $v){
            if($k == 'id') continue;
            $colums[] = $k." = :".$k;
            $values[':'.$k] = $v;
        }
        $sql = "UPDATE ". static::TABLE ." SET ". implode(', ', $colums) ." WHERE id = ".$this->id;
        return DB::getInstance()->execute($sql, $values);
    }
}