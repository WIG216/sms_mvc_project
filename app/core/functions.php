<?php
function show($stuff)
{
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";
}

function esc($str)
{
    // to avoid that some one modifies the code using js 
    return htmlspecialchars($str);
}