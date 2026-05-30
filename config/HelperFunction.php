<?php

function url($page, $action = null, $id = null)
{
    $url = "index.php?page={$page}";

    if ($action !== null) {
        $url .= "&action={$action}";
    }

    if ($id !== null) {
        $url .= "&id={$id}";
    }

    return $url;
}

function debug($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    exit;
}
?>