<?php

/**
 * xay dung doi tuong pro_image de quan ly cac tac vu lien quan toi table pro_images trong sql
 * 
 */
class pro_image extends sql_builder
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'pro_images';
    }
    function list_image($id) {
        $sql = "SELECT *  FROM `{$this->table}`
        WHERE  product_id=? ORDER BY updated_at DESC LIMIT 4";
        return $this->setquery($sql)->loadrows([$id]);
    }

}
