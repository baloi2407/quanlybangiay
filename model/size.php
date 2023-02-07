<?php

/**
 * xay dung doi tuong size de quan ly cac tac vu lien quan toi table sizes trong sql
 * 
 */
class size extends sql_builder
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'sizes';
    }
    

}
