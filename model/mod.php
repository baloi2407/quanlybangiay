<?php

/**
 * xay dung doi tuong mod de quan ly cac tac vu lien quan toi table mods trong sql
 * 
 */
class mod extends sql_builder
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'mods';
    }

}
