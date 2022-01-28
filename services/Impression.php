<?php

namespace services;

use connection\interface\DbConnectionInterface;

class Impression
{
    protected DbConnectionInterface $connection;

    protected string $host;
    protected string $agent;
    protected string $url;

    public function __construct(DbConnectionInterface $connection, array $server)
    {
        $this->connection = $connection;
        $this->host = $server['HTTP_HOST'];
        $this->agent = $server['HTTP_USER_AGENT'];
        $this->url = $server['HTTP_REFERER'] ?? '';
    }

    public function addImpression()
    {
        $this->connection->insertOrUpdate("
            INSERT INTO `impressions` (`ip_address`, `user_agent`, `view_date`, `page_url`, `views_count`) VALUES ( ? , ?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE   
            views_count = views_count + 1, view_date = ?",
            [
                $this->host,
                $this->agent,
                date("Y-m-d H:i:s"),
                $this->url,
                1,
                date("Y-m-d H:i:s")
            ]
        );
    }


}