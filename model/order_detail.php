<?php

/**
 * xay dung doi tuong order_detail de quan ly cac tac vu lien quan toi table order_details trong sql
 * 
 */
class order_detail extends sql_builder
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'order_detail';
    }
    function _listcount($from,$to,$limit=0,$offset=0) {
        $limit_stat=$offset_stat="";
        if($limit>0) $limit_stat = "LIMIT {$limit}";
        if($offset>0) $offset_stat = "OFFSET {$offset}";
        $sql = "SELECT products.name as name,size, SUM(`{$this->table}`.qty) as qtybuy, SUM(`{$this->table}`.price) as price
        FROM `{$this->table}` JOIN products on products.id=`{$this->table}`.product_id
        WHERE `{$this->table}`.created_at BETWEEN ? AND ?
        GROUP BY `{$this->table}`.product_id,`{$this->table}`.size
        ORDER BY qtybuy DESC {$limit_stat} {$offset_stat}";
        return $this->setquery($sql)->loadrows([$from,$to]);
    }
}
