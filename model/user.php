<?php

/**
 * xay dung doi tuong user de quan ly cac tac vu lien quan toi table users trong sql
 * 
 */
class user extends sql_builder
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'users';
    }
    function login($u, $p)
    {
        $sql = 'select * from users where username = ? and password = ?';
        return $this->setquery($sql)->loadrow([$u, $p]);
    }
    function _listsearch($kw,array $where = [],$limit=0,$offset=0)
    {
        $limit_stat=$offset_stat="";
        if($limit>0) $limit_stat = "LIMIT {$limit}";
        if($offset>0) $offset_stat = "OFFSET {$offset}";
        $wherestring = '';
        $params = [];
        if ($where) {
            foreach ($where as $wcolumn => $wvalue) {
                $wherestring .= " and `{$wcolumn}` = ? ";
                $params[] = trim($wvalue);
            }
        }
        $sql = "SELECT *  FROM `{$this->table}`
        WHERE 1 and username like '%{$kw}%' or email like '%$kw%'  {$wherestring} {$limit_stat} {$offset_stat}";
        return $this->setquery($sql)->loadrows($params);
    }
}
