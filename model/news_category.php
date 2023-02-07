<?php

/**
 * xay dung doi tuong news_category de quan ly cac tac vu lien quan toi table news_categories trong sql
 * 
 */
class news_category extends sql_builder
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'news_categories';
    }
    

}
