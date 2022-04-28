<?php

require_once "UserNis.php";
require_once "DAO.php";

class UserNisDAO extends DAO
{
    public function selectAll()
    {
        $sql = "SELECT * FROM usernis ORDER BY name";
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            $userNis = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'UserNis', ['name', 'nis', 'id']);
            return $userNis;
        } catch (PDOException $e) {
            throw new PDOException($e);
        }
    }

    public function select($id)
    {
        $sql = "SELECT * FROM usernis WHERE id = :id ORDER BY name";
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $userNis = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'UserNis', ['name', 'nis', 'id']);
            return $userNis;
        } catch (PDOException $e) {
            throw new PDOException($e);
        }
    }

    public function selectAllFilter($nis)
    {
        $sql = "SELECT * FROM usernis WHERE nis LIKE :nis ORDER BY name";
        $formNis = trim($nis, ' ');
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':nis', $formNis);
            $stmt->execute();
            $userNis = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'UserNis', ['name', 'nis', 'id']);
            return $userNis;
        } catch (PDOException $e) {
            throw new PDOException($e);
        }
    }

    public function insert($userNis)
    {
        $sql = "INSERT INTO usernis (name, nis) VALUES (:name, :nis)";
        $stmt = $this->connection->prepare($sql);

        $userName = $userNis->getName();
        $userNis = $userNis->getNis();

        $stmt->bindParam(':name', $userName);
        $stmt->bindParam(':nis', $userNis);
        
        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            throw $e;
            return false;
        }
    }

    public function update($userNis)
    {
        $sql = "UPDATE usernis SET name = :name WHERE id = :id";
        $stmt = $this->connection->prepare($sql);

        $userId = $userNis->getId();
        $userName = $userNis->getName();

        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':name', $userName, PDO::PARAM_STR);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            throw $e;
            return false;
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM usernis WHERE id = :id";
        $stmt = $this->connection->prepare($sql);

        $stmt->bindParam(':id', $id);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            throw new PDOException($e);
        }
    }
}
