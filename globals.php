<?php

define('IS_CLI', ('cli' == PHP_SAPI));

if (! function_exists('d')) {
/**
 * Dump the passed variables and end the script.
 *
 * @param mixed
 */
function d()
{
    array_map(function ($x) {
        var_dump($x);
    }, func_get_args());
}
}

if (! function_exists('dd')) {
    /**
     * Dump the passed variables and end the script.
     *
     * @param mixed
     */
    function dd()
    {
        array_map(function ($x) {
            var_dump($x);
        }, func_get_args());

        die(1);
    }
}

if (! function_exists('ed')) {
    /**
     * @param string $var
     */
    function ed($var)
    {
        echo $var;
        die(1);
    }
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
