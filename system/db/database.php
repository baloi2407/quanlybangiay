<?php

/**
 * xay dung kieu du lieu để thao tác với database (bất kỳ)
 * thanh vien: sql , pdo, statement
 * phuong thuc: - khởi tạo không tham số
 *              - setquery($sql) -> cài đặt câu truy vấn can thuc thi
 *              - loadrow($params = []) :params=> gia tri de hoan chinh cau sql => return: 1 obj
 *              - loadrows($params = []) :params=> gia tri de hoan chinh cau sql => return: array obj
 *              - save($params = []) :params=> gia tri de hoan chinh cau sql => return: 1 true/false
 *              - disconnect() => ngat ket noi 
 * 
 */
class database
{
    //khai bao thanh vien
    var $sql, $pdo, $statement;
    function __construct()
    {
        try {
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];
            $this->pdo = new PDO('mysql:host='.HOST.';port='.PORT.';dbname='.DBNAME.';',USERNAME,PASSWORD, $options);
        } catch (PDOException $e) {
            exit('server error: ' . $e->getMessage());
        }
    }
    function setquery($sql)
    {
        $this->sql  = $sql;
        return $this;
    }
    function loadrow($params = [])
    {
        try {
            $this->statement = $this->pdo->prepare($this->sql);
            $this->statement->execute($params);
            return $this->statement->fetch(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit('server error: ' . $e->getMessage());
        }
    }
    function loadrows($params = [])
    {
        try {
            $this->statement = $this->pdo->prepare($this->sql);
            $this->statement->execute($params);
            return $this->statement->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            exit('server error: ' . $e->getMessage());
        }
    }
    function save($params = [])
    {
        try {
            $this->statement = $this->pdo->prepare($this->sql);
            return $this->statement->execute($params);
        } catch (PDOException $e) {
            exit('server error: ' . $e->getMessage());
        }
    }
    
    function disconnect()
    {
        $this->pdo = null;
        $this->statement = null;
    }
}
