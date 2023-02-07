<?php
class sql_builder extends database
{
    function __construct()
    {
        parent::__construct();
    }
    var $table;
    function insert(array $data) // [key=>value]
    {
        //INSERT INTO `users` (`id`, `username`, `password`, `Firstname`, `Lastname`, `DoB`, `Gender`, `Position`, `Division`, `timelife`, 
        //`reset_token`, `email`, `phone`, `image`, `group_id`, `Address`, `City`, `created_at`, `status`, `email_verified_at`, `remember_token`) 
        //VALUES (NULL, '', '', NULL, '', CURRENT_TIMESTAMP, '', '', '', NULL, '', NULL, NULL, NULL, NULL, '', '', CURRENT_TIMESTAMP, '1', '', '');
        $columnstring = '';
        $valuestring = '';
        $params = [];
        foreach ($data as $column => $value) {
            $columnstring .= "`{$column}`,";
            $valuestring .= "?,";
            $params[] = trim($value);
        }
        $columnstring = rtrim($columnstring, ',');
        $valuestring = rtrim($valuestring, ',');
        $sql = "INSERT INTO `{$this->table}` ({$columnstring}) 
        VALUES ({$valuestring})";
        return $this->setquery($sql)->save($params);
    }
    function _update(array $data, array $where = [])
    {
        //UPDATE `users` SET `Firstname` = 'fghn' WHERE `users`.`id` = 1;
        $wherestring = '';
        $setstring = '';
        $params = [];
        foreach ($data as $column => $value) {
            $setstring .= "`{$column}` = ?,";
            $params[] = trim($value);
        }
        $setstring = rtrim($setstring, ',');
        if ($where) {
            foreach ($where as $wcolumn => $wvalue) {
                $wherestring .= " and `{$wcolumn}` = ? ";
                $params[] = trim($wvalue);
            }
        }
        $sql = "UPDATE `{$this->table}` SET {$setstring}
        WHERE 1 {$wherestring}";
        return $this->setquery($sql)->save($params);
    }
    function delete($id)
    {
        $sql = "DELETE FROM `{$this->table}` where id =?";
        return $this->setquery($sql)->save([$id]);
    }
    function _list(array $where = [],$limit=0,$offset=0)
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
        WHERE 1 {$wherestring} {$limit_stat} {$offset_stat}";
        return $this->setquery($sql)->loadrows($params);
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
        WHERE 1 and name like '%{$kw}%'  {$wherestring} {$limit_stat} {$offset_stat}";
        return $this->setquery($sql)->loadrows($params);
    }
    function _item($id,array $where = [])
    {
        $wherestring = '';
        $params = [$id];
        if ($where) {
            foreach ($where as $wcolumn => $wvalue) {
                $wherestring .= " and `{$wcolumn}` = ? ";
                $params[] = trim($wvalue);
            }
        }
        $sql = "SELECT *  FROM `{$this->table}`
        WHERE id = ? {$wherestring} ORDER BY id DESC";
        return $this->setquery($sql)->loadrow($params);
    }
   
    function last_id() {
        $sql = "SELECT MAX(id) as last_id FROM `{$this->table}`";
        return $this->setquery($sql)->loadrow([]);
    }
}
