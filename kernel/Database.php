<?php

require 'config.php';

class Database
{
    private static $_pdo;

    /**
     * @return PDO
     */
    private static function _getPdo()
    {
        if (!empty(self::$_pdo))
        {
            return self::$_pdo;
        }

        try
        {
            self::$_pdo = new PDO('mysql:dbname='. DB .';host='. HOST, USER, PW);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        // Pour l'encodage en UTF 8 lors des requêtes SQL
        self::$_pdo->exec('SET NAMES \'utf8\'');
        self::$_pdo->prepare('SET NAMES \'utf8\'');

        return self::$_pdo;
    }

    public static function query($statement, $params = [])
    {
        $query = self::_getPdo()->prepare($statement);
        $query->execute($params);

        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public static function queryFirst($statement, $params = [])
    {
        $result = self::query($statement, $params);
        if (count($result) > 0)
        {
            return $result[0];
        }
        return null;
    }

    public static function getLastId()
    {
        return self::_getPdo()->lastInsertId();
    }

    public static function exec($statement, $params = [])
    {
        $exec = self::_getPdo()->prepare($statement);
        $result = $exec->execute($params);
        return $result;
    }
}