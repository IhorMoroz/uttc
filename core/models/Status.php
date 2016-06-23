<?php

namespace core\models;


use core\helpers\DB;

class Status extends Model
{
    const TABLE = 'status';

    static public function getStatusByKey($status)
    {
        $sql = "SELECT *
                FROM ".self::TABLE."
                WHERE id = :status";
        return DB::getInstance()->prepareQuery($sql,['status' => $status],__CLASS__)[0];
    }

}