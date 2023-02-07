<?php

/**
 * xay dung doi tuong group de quan ly cac tac vu lien quan toi table groups trong sql
 * 
 */
class group extends sql_builder
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'groups';
    }
    function groupname($name)
    {
        $sql = "SELECT *  FROM `{$this->table}`
        WHERE name=? ";
        return $this->setquery($sql)->loadrow([$name]);
    }
}
