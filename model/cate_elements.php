<?php

/**
 * xay dung doi tuong cate_elements de quan ly cac tac vu lien quan toi table cate_elements trong sql
 * 
 */
class cate_elements extends sql_builder
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'cate_elements';
    }

    function delete($id)
    {
        $sql = "DELETE FROM `{$this->table}` where category_id =?";
        return $this->setquery($sql)->save([$id]);
    }
    function existcate($cate_id, $ele_id)
    {
        $sql = "SELECT * FROM `{$this->table}` where category_id =? and element_id=?";
        return $this->setquery($sql)->loadrows([$cate_id, $ele_id]);
    }
    function pro_ele($id)
    {
        $sql = "SELECT category_id,element_id,elements.name FROM `{$this->table}` JOIN categories on category_id=categories.id 
        JOIN elements on elements.id=element_id 
        WHERE categories.id=?";
        return $this->setquery($sql)->loadrows([$id]);
    }
}
