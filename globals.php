<?php

define('IS_CLI', ('cli' == PHP_SAPI));

function d($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

function dd($var)
{
    echo IS_CLI ? '' : '<pre>';
    var_dump($var);
    echo IS_CLI ? '' : '</pre>';
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

