<?php

/**
 * xay dung doi tuong supplier de quan ly cac tac vu lien quan toi table suppliers trong sql
 * 
 */
class supplier extends sql_builder
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'suppliers';
    }

}
