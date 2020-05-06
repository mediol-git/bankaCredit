<?php

class Bd
{
    private $mysqli;

    public function __construct() {
        $this->mysqli = new mysqli("localhost", "bankacredit", "9EWzI60T", "bankacredit");

        $sql = "CREATE TABLE IF NOT EXISTS `data`
(
    `id`              int(11) AUTO_INCREMENT PRIMARY KEY,
    `sum`             int(11)      NOT NULL DEFAULT 0,
    `phone`           varchar(36)  NOT NULL DEFAULT \"\",
    `email`           varchar(64)  NOT NULL DEFAULT \"\",
    `name`            varchar(32)  NOT NULL DEFAULT \"\",
    `surname`         varchar(32)  NOT NULL DEFAULT \"\",
    `patronymic`      varchar(32)  NOT NULL DEFAULT \"\",
    `birthday`        varchar(32)  NOT NULL DEFAULT \"\",
    `gender`          varchar(16)  NOT NULL DEFAULT \"\",
    `target`          varchar(64)  NOT NULL DEFAULT \"\",
    `document_type`   varchar(32)  NOT NULL DEFAULT \"\",
    `document_number` varchar(64)  NOT NULL DEFAULT \"\",
    `inn`             varchar(64)  NOT NULL DEFAULT \"\",
    `valid`           varchar(16)  NOT NULL DEFAULT \"\",
    `region`          varchar(256) NOT NULL DEFAULT \"\",
    `city`            varchar(64)  NOT NULL DEFAULT \"\",
    `credit_history`  tinyint(1)   NOT NULL DEFAULT 0,
    `employment`      varchar(64)  NOT NULL DEFAULT 0
)";
        $this->mysqli->query($sql);

        $sql = "CREATE TABLE IF NOT EXISTS `hashes`
(
    `id`   int(11)      NOT NULL,
    `hash` varchar(256) NOT NULL
)";

        $this->mysqli->query($sql);

    }

    public function auth($id, $hash) {
        $id = $this->mysqli->real_escape_string($id);
        $hash = $this->mysqli->real_escape_string($hash);
        $sql = "SELECT * FROM `hashes` WHERE `id`=" . $id . " AND `hash` LIKE '" . $hash . "'";
        $result = $this->mysqli->query($sql);
        if ($result->num_rows === 0) return false;
        return true;
    }

    public function generateHash() {
        $sql = "INSERT INTO `data` (`sum`) VALUES (0)";
        $this->mysqli->query($sql);
        $insertId = $this->mysqli->insert_id;

        $hash = $this->mysqli->real_escape_string(md5(mt_rand(0, 100000) . mt_rand(0, 100000)));
        $sql = "INSERT INTO `hashes` (`id`, `hash`) VALUES (" . $insertId . ", '" . $hash . "')";
        $this->mysqli->query($sql);
        return ["id" => $insertId, "hash" => $hash];
    }

    public function insertData($id, $arr) {
        $id = $this->mysqli->real_escape_string($id);

        $sql = "UPDATE `data` SET ";
        foreach ($arr as $key => $value) {
            $value = $this->mysqli->real_escape_string($value);
            $key = $this->mysqli->real_escape_string($key);

            $sql .= "`" . $key . "`='" . $value . "',";
        }

        $sql = mb_substr($sql, 0, -1, "UTF-8");
        $sql .= " WHERE `id`=" . $id;
        $this->mysqli->query($sql);
    }

}

$bd = new Bd();