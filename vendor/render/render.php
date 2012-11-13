<?php

function render($p,$d=array())
    {
    extract($d);
    ob_start();
    require('../src/views/'.$p);
    return ob_get_clean();
    }
