<?php

namespace App\Repositories;

/**
 * Repository Queries
 * @abstract
 */
abstract class RepoQueries
{
    /**
     * @var \PgSql\Connection
     */
    private $dbconn;

    /**
     * RepoQueries Constructor
     */
    public function __construct()
    {
        global $dbconn;
        $this->$dbconn = $dbconn;
    }

    /**
     * @param string $sql
     * @param array $params
     * @return array|bool
     */
    protected function getRowParams(string $sql, array $params)
    {
        $result = pg_query_params($this->dbconn, $sql, $params);
        $row = pg_fetch_assoc($result);

        return $row;
    }

    /**
     * @param string $sql
     * @return array
     */
    protected function getRows(string $sql)
    {
        $result = pg_query($this->dbconn, $sql);
        $rows = pg_fetch_all($result);

        return $rows;
    }

    /**
     * @param string $sql
     * @param array $params
     * @return bool
     */
    protected function doQueryParams(string $sql, array $params)
    {
        $result = pg_query_params($this->dbconn, $sql, $params);

        return ($result ? true : false);
    }
}

?>