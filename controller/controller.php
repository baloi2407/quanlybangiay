<?php
class controller
{
    function render($view, $data = [], $layout = 'master') // data: array co key la ten tu dat
    {
        if (is_array($data))
            extract($data);
        include 'view/' . $layout . '.php';
    }
} 