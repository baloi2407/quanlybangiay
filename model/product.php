<?php

/**
 * xay dung doi tuong product de quan ly cac tac vu lien quan toi table products trong sql
 * 
 */
class product extends sql_builder
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'products';
    }
    function get_category($id)
    {
        $sql = 'SELECT categories.name as cate_name FROM products JOIN categories on categories.id=?';
        return $this->setquery($sql)->loadrow([$id]);
    }
    function get_supplier($id)
    {
        $sql = 'SELECT suppliers.name as sup_name FROM products JOIN suppliers on suppliers.id=?';
        return $this->setquery($sql)->loadrow([$id]);
    }
    function get_elements($id)
    {
        $sql = 'SELECT * FROM products JOIN pro_elements on product_id=id where id=?';
        return $this->setquery($sql)->loadrows([$id]);
    }
    function get_last_insert_id()
    {
        $sql = 'SELECT id FROM products order by id desc';
        return $this->setquery($sql)->loadrow([]);
    }
}
