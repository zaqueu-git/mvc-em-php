<?php
namespace application\helpers;

class DataAccessObject
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function insert(string $table, array $data)
    {
        $fields = implode(", ", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));

        $sql = "INSERT INTO {$table} ({$fields}) VALUES ({$values}) ";

        $stmt = $this->db->prepare($sql);

        foreach ($data as $key => $value) {

            if (is_int($value)) {
                $type = 'PDO::PARAM_INT';
            } else {
                $type = 'PDO::PARAM_STR';
            }

            $stmt->bindValue(":$key", $value, $type);
        }

        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                return $this->db->lastInsertId();
            }
        }
        
        return false;
    }

    public function update(string $table, array $data, string $conditions)
    {
        $parameters = NULL;

        foreach ($data as $key => $value) {
            $parameters .= "$key=:$key, ";
        }

        $parameters = rtrim($parameters, ", ");

        $sql = "UPDATE {$table} SET {$parameters} WHERE {$conditions}";

        $stmt = $this->db->prepare($sql);

        foreach ($data as $key => $value) {

            if (is_int($value)) {
                $type = 'PDO::PARAM_INT';
            } else {
                $type = 'PDO::PARAM_STR';
            }

            $stmt->bindValue(":$key", $value, $type);
        }

        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                return true;
            }
        }

        return false;
    }

    public function delete(string $table, $conditions = NULL)
    {
        if ($conditions != NULL) {
            $conditions = " WHERE " . $conditions;
        }

        $sql = "DELETE FROM {$table} {$conditions}";

        $stmt = $this->db->prepare($sql);

        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                return true;
            }
        }

        return false;
    }
    
    public function select(string $sql, $parameters = [])
    {
        $stmt = $this->db->prepare($sql);

        foreach ($parameters as $key => $value) {

            if (is_int($value)) {
                $type = 'PDO::PARAM_INT';
            } else {
                $type = 'PDO::PARAM_STR';
            }

            $stmt->bindValue(":$key", $value, $type);

        }

        if ($stmt->execute()) {

            if ($stmt->rowCount() == 1) {
                return $stmt->fetch();
            }

            if ($stmt->rowCount() > 1) {
                return $stmt->fetchAll();
            }

        }

        return [];
    }
}