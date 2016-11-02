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

/**
 * @param \yii\db\Query $select
 * @param \yii\db\Connection $db
 * @return string
 */
function getsql(\yii\db\Query $select, $db = null)
{
    dd($db);
    if ($db === null) {
        $db = Yii::$app->getDb();
    }
    return $select->prepare(Yii::$app->db->queryBuilder)->createCommand($db)->rawSql;
}

/**
 * @param \yii\db\Query $select
 * @param \yii\db\Connection $db
 */
function ddsql(\yii\db\Query $select, $db = null)
{
    dd(getsql($select, $db));
}

