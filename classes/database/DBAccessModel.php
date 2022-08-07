<?php

require_once "classes/database/connection.php";

class DBAccessModel
{



    public static function find(string $pquery, array $values)
    {

        $connection = Connection::getConnection();
        $stmt = $connection->prepare($pquery);
        try {
            $stmt->execute($values);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $cols = array();
            foreach (range(0, $stmt->columnCount() - 1) as $index) {
                $cols[] = $stmt->getColumnMeta($index)["name"];
            }
        } catch (Exception $e) {
            $data = array(
                "ok" => false,
                "error" => $e->getMessage(),
                "data" => $values
            );
            return $data;
        }

        $stmt->closeCursor();
        $connection = null;

        return array("ok" => true, "data" => $data, "cols" => $cols);
    }

    public static function create(string $pquery, array $valuesArray)
    {
        if (is_array($valuesArray)) {
            $connection = Connection::getConnection();

            $stmt = $connection->prepare($pquery);

            try {
                $stmt->execute($valuesArray);
            } catch (Exception $e) {
                $data = array(
                    "ok" => false,
                    "error" => $e->getMessage(),
                    "data" => $valuesArray
                );
                return $data;
            }

            $data = array(
                "ok" => true,
                "id" => $connection->lastInsertId(),
                "data" => $valuesArray
            );
        } else {
            $data = array(
                "ok" => false,
                "id" => 0,
                "data" => $valuesArray
            );
        }
        $stmt->closeCursor();
        $connection = null;
        return $data;
    }

    public static function delete(string $pquery, array $id)
    {
        $connection = Connection::getConnection();
        $stmt = $connection->prepare($pquery);
        try {
            $stmt->execute(array("id" => $id));
        } catch (Exception $e) {
            $data = array(
                "ok" => false,
                "error" => $e->getMessage(),
                "id" => $id
            );
            return $data;
        }
        $data = array(
            "ok" => true,
            "id" => $id
        );
        $stmt->closeCursor();
        $connection = NULL;
        return $data;
    }

    public static function update(string $pquery, array $id, array $values)
    {
        $connection = Connection::getConnection();

        $bindValues = array_merge($id, $values);

        $stmt = $connection->prepare($pquery);
        try {
            $stmt->execute($bindValues);
        } catch (Exception $e) {
            $data = array(
                "ok" => false,
                "error" => $e->getMessage(),
                "data" => $values
            );
            return $data;
        }
        $data = [
            "ok" => true,
            "id" => $id,
            "data" => $values
        ];
        $stmt->closeCursor();
        $connection = NULL;
        return $data;
    }
}
