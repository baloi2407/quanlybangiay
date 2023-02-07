<?php

/**
 * xay dung doi tuong pro_category de quan ly cac tac vu lien quan toi table pro_categories trong sql
 * 
 */
class pro_category extends sql_builder
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'pro_categories';
    }

}
