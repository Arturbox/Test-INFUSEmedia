<?php

namespace connection\interface;

interface DbConnectionInterface
{
    public function insertOrUpdate(string $query = "", array $params = []);
}