<?php

function setInternalServerError($errno = null, $errstr = null, $errfile = null, $errline = null)
{

    http_response_code(500);

    echo '<h1>Error</h1>';

    if (!DEBUG){
        exit;
    }

    if(is_object($errno)){
        $err = $errno;
        $errno = $err->getCode();
        $errstr = $err->getMessage();
        $errfile = $err->getFile();
        $errline = $err->getLine();

    }

    switch ($errno) {
        case E_USER_ERROR:
            echo '<strong>ERROR</strong> [' . $errno . ']' . $errstr . "<br>\n";
        break;

        case E_USER_WARNING:
            echo '<strong>WARNING</strong> [' . $errno . ']' . $errstr . "<br>\n";
            break;
        case E_USER_NOTICE:
            echo '<strong>NOTICE</strong> [' . $errno . ']' . $errstr . "<br>\n";
            break;

        default:
        echo '<strong>Unknow error type</strong> [' . $errno . ']' . $errstr . "<br>\n";
        break;
    }

    echo '<ul>';

    foreach(debug_backtrace() as $error){
        if (!empty($error['file'])){
            echo '<li>';
            echo $error['file'] . ':';
            echo $error['line'];
            echo '</li>';
        }
    }
    //seguir o caminho dos erros de baixo para cima

    echo '</ul>';

    //exit;
}

set_error_handler('setInternalServerError');
set_exception_handler('setInternalServerError');
