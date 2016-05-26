<?php

$is_cli = false;

if (PHP_SAPI == 'cli') {
    $is_cli = true;
}

function d($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

function dd($var)
{
    global $is_cli;
    echo $is_cli ? '' : '<pre>';
    var_dump($var);
    echo $is_cli ? '' : '</pre>';
    die;
}

function ed($var)
{
    echo $var;
    die;
}

function showSql(\yii\db\Query $select)
{
    return $select->prepare(Yii::$app->db->queryBuilder)->createCommand()->rawSql;
}
