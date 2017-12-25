<?php

class DB {

    private $_pdo,
            $_query,
            $_error = false,
            $_results,
            $_count = 0;

    public function __construct($db_host, $db_name, $db_username, $db_password) {

        $db_username = Config::get('db.user');
        $db_password = Config::get('db.password');
        $dsn = 'mysql:dbname=' . $db_name . ';host=' . $db_host .'';

        try {

            $this->_pdo = new PDO($dsn, $db_username, $db_password);

        } catch(PDOException $e) {

            echo "Failed to connect to Database";
            die($e->getMessage());

        }

    }

    public function escape($data) {

        return htmlentities($data, ENT_QUOTES);

    }

    public function query($sql, $params = array()) {

        if (!empty($params)) {

            $this->_error = false;

            if ($this->_query = $this->_pdo->prepare($sql)) {

                $x = 1;

                if (count($params)) {

                    if (is_array($params) || is_object($params) || is_string($params) || is_numeric($params)) {

                        foreach ($params as $param) {

                            $this->_query->bindValue($x, $param);
                            $x++;

                        }
                    }
                }

                if ($this->_query->execute()) {

                    $this->_results = $this->_query->fetchAll(PDO::FETCH_ASSOC);
                    $this->_count = $this->_query->rowCount();

                } else {

                    $this->_error = true;

                }

            }
            return $this;

        } else {

            $this->_error = false;

                if ($this->_query = $this->_pdo->prepare($sql)) {

                    if ($this->_query->execute()) {

                        $this->_results = $this->_query->fetchAll(PDO::FETCH_ASSOC);
                        $this->_count = $this->_query->rowCount();

                    } else {

                        $this->_error = true;
                    }

                }
            return $this;

        }

    }

    public function getExecute() {

        return $this->_query->execute();

    }

    public function fetch() {

        return $this->_query->fetch(PDO::FETCH_ASSOC);

    }

    public function countRow() {

        return $this->_count;

    }

    public function results() {

        return $this->_results;

    }

    public function first() {

        return $this->_results[0];

    }

    public function last() {

        return $this->results[$this->_count - 1];

    }

    public function error() {

        return $this->_error;

    }
}
