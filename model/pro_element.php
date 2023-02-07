<?php

/**
 * xay dung doi tuong pro_element de quan ly cac tac vu lien quan toi table pro_elements trong sql
 * 
 */
class pro_element extends sql_builder
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'pro_elements';
    }
    function _element($id,$size)
    {
        $sql = "SELECT *  FROM `{$this->table}`
        WHERE product_id = ? and size = ? ORDER BY updated_at DESC";
        return $this->setquery($sql)->loadrow([$id,$size]);
    }
    function _del_ele($id,$size) {
        $sql = "DELETE FROM `{$this->table}` where product_id = ? and size = ?";
        return $this->setquery($sql)->save([$id,$size]);
    }
    function _listpro_ele($limit=0,$offset=0) {
        $limit_stat=$offset_stat="";
        if($limit>0) $limit_stat = "LIMIT {$limit}";
        if($offset>0) $offset_stat = "OFFSET {$offset}";
        $sql = "SELECT * FROM `{$this->table}` JOIN products on products.id = pro_elements.product_id {$limit_stat} {$offset_stat}";
        return $this->setquery($sql)->loadrows([]);
    }
    function _itempro_ele($id,$size) {
        $sql = "SELECT * FROM `{$this->table}` JOIN products on products.id = pro_elements.product_id where pro_elements.product_id = ? and pro_elements.size = ? AND
        pro_elements.size > 0";
        return $this->setquery($sql)->loadrow([$id,$size]);
    }
    function _listsearch_pro_ele($kw,array $where = [],$limit=0,$offset=0)
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
        $sql = "SELECT *  FROM `{$this->table}` join `products` on products.id = product_id
        WHERE 1 and name like '%{$kw}%'  {$wherestring} {$limit_stat} {$offset_stat}";
        return $this->setquery($sql)->loadrows($params);
    }

}
