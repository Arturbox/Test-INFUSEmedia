<?php

namespace connection;

use connection\interface\DbConnectionInterface;
use PDO;

class DbConnection implements DbConnectionInterface
{
    /**
     * @var PDO
     */
    private PDO $connection;

    /**
     * @param $d
     * @param $u
     * @param $p
     */
    public function __construct($d, $u, $p)
    {
        $this->connection = new PDO($d, $u, $p);
    }


    /**
     * @param string $query
     * @param array $params
     * @return void
     */
    public function insertOrUpdate(string $query = "", array $params = [])
    {
        $this->executeStatement($query, $params);
    }


    /**
     * @param string $query
     * @param array $params
     * @return void
     */
    private function executeStatement(string $query = "", array $params = []): void
    {
        $stmt = $this->connection->prepare($query);

        $stmt->execute($params);
    }
}