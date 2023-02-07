<?php

/**
 * xay dung doi tuong news_image de quan ly cac tac vu lien quan toi table news_image trong sql
 * 
 */
class news_image extends sql_builder
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'news_images';
    }
    function list_image($id) {
        $sql = "SELECT *  FROM `{$this->table}`
        WHERE  news_id=? ORDER BY updated_at DESC LIMIT 4";
        return $this->setquery($sql)->loadrows([$id]);
    }

}
