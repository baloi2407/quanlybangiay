<?php

/**
 * xay dung doi tuong category de quan ly cac tac vu lien quan toi table categories trong sql
 * 
 */
class category extends sql_builder
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'categories';
    }
    function cate_element($id) {
        $sql = 'select * from categories join cate_elements on category_id = id where element_id = ?';
        return $this->setquery($sql)->loadrows([$id]);
    }

}
