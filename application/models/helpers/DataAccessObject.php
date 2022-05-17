<?php
namespace application\models\helpers;

use PDO;

class DataAccessObject
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function insert(string $table, array $data)
    {
        try {
            $fields = implode(", ", array_keys($data));
            $values = ":" . implode(", :", array_keys($data));
    
            $sql = "INSERT INTO {$table} ({$fields}) VALUES ({$values}) ";
    
            $stmt = $this->db->prepare($sql);
    
            foreach ($data as $key => $value) {
    
                if (is_int($value)) {
                    $type = PDO::PARAM_INT;
                } else {
                    $type = PDO::PARAM_STR;
                }
    
                $stmt->bindValue(":$key", $value, $type);
            }
    
            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    return $this->db->lastInsertId();
                }
            }
            
            return false;
        } catch (\Throwable $th) {
            $table = "table " . $table;

            if (empty($data)) {
                $data = "no data";
            } else {
                $data = json_encode($data);
            }

            $array = [
                "table" => $table,
                "data" => $data,
                "message" => $th->getMessage(),
                "trace" => $th->getTraceAsString(),
            ];
            $array = implode(PHP_EOL, $array);
            
            new CustomErrors($array);

            return false;
        }
    }

    public function update(string $table, array $data, string $conditions)
    {
        try {
            $parameters = NULL;

            foreach ($data as $key => $value) {
                $parameters .= "$key=:$key, ";
            }
    
            $parameters = rtrim($parameters, ", ");
    
            $sql = "UPDATE {$table} SET {$parameters} WHERE {$conditions}";
    
            $stmt = $this->db->prepare($sql);
    
            foreach ($data as $key => $value) {
    
                if (is_int($value)) {
                    $type = PDO::PARAM_INT;
                } else {
                    $type = PDO::PARAM_STR;
                }
    
                $stmt->bindValue(":$key", $value, $type);
            }
    
            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    return true;
                }
            }
    
            return false;
        } catch (\Throwable $th) {
            $table = "table " . $table;

            if (empty($data)) {
                $data = "no data";
            } else {
                $data = json_encode($data);
            }

            if (empty($conditions)) {
                $conditions = "no conditions";
            }

            $array = [
                "table" => $table,
                "data" => $data,
                "conditions" => $conditions,
                "message" => $th->getMessage(),
                "trace" => $th->getTraceAsString(),
            ];
            $array = implode(PHP_EOL, $array);
            
            new CustomErrors($array);

            return false;
        }
    }

    public function delete(string $table, $conditions = NULL)
    {
        try {
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
        } catch (\Throwable $th) {
            $table = "table " . $table;

            if (empty($conditions)) {
                $conditions = "no conditions";
            }
            
            $array = [
                "table" => $table,
                "conditions" => $conditions,
                "message" => $th->getMessage(),
                "trace" => $th->getTraceAsString(),
            ];
            $array = implode(PHP_EOL, $array);
            
            new CustomErrors($array);

            return false;
        }
    }
    
    public function select(string $sql, $parameters = [])
    {
        try {
            $stmt = $this->db->prepare($sql);

            foreach ($parameters as $key => $value) {
    
                if (is_int($value)) {
                    $type = PDO::PARAM_INT;
                } else {
                    $type = PDO::PARAM_STR;
                }
    
                $stmt->bindValue(":$key", $value, $type);
    
            }
    
            if ($stmt->execute()) {
    
                if ($stmt->rowCount() == 1) {
                    return $stmt->fetch(PDO::FETCH_OBJ);
                }
    
                if ($stmt->rowCount() > 1) {
                    return $stmt->fetchAll(PDO::FETCH_OBJ);
                }
    
            }
    
            return [];
        } catch (\Throwable $th) {
            if (empty($parameters)) {
                $parameters = "no parameters";
            } else {
                $parameters = json_encode($parameters);
            }

            $array = [
                "sql" => $sql,
                "parameters" => $parameters,
                "message" => $th->getMessage(),
                "trace" => $th->getTraceAsString(),
            ];
            $array = implode(PHP_EOL, $array);

            new CustomErrors($array);

            return false;
        }
    }
}