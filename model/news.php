<?php

/**
 * xay dung doi tuong news de quan ly cac tac vu lien quan toi table news trong sql
 * 
 */
class news extends sql_builder
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'news';
    }

}
