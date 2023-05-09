<?php

namespace Engine\Core\Database;

use \PDO;
use \PDOException;

class Connection
{
    private $link;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        $config = [
            'host' => '127.0.0.1',
            'db_name' => 'cms',
            'username' => 'root',
            'password' => '12345678',
            'charset' => 'utf8',
        ];

        $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['db_name'] . ';charset=' . $config['charset'];

        $this->link = new PDO($dsn, $config['username'], $config['password']);

        return $this;
    }

    public function execute($sql)
    {
        $sth = $this->link->prepare($sql);

        return $sth->execute();
    }

    public function query($sql)
    {
        $exe = $this->execute($sql);

        $result = $exe->fetchAll(PDO::FETCH_ASSOC);

        if($result === false)
        {
            return [];
        }

        return $result;
    }

}