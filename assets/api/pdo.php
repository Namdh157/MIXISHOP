<?php
function pdo_connection() {
    $dbName = "mysql:host=localhost;dbname=the_southdang;charset=utf8";
    $username = 'root';
    $password = '';

    $connection = new PDO($dbName, $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO ::ERRMODE_EXCEPTION);
    return $connection;
}
function pdo_execute($sql) {
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $connection = pdo_connection();
        $stmt = $connection->prepare($sql);
        $stmt->execute($sql_args);
        return $stmt;
    }
    catch(PDOException $e) {
        throw $e;
    } finally {
        unset($connection);
    }
}
function pdo_query($sql) {
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $connection = pdo_connection();
        $stmt = $connection->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetchAll();
        return $row;
    }
    catch(PDOException $e) {
        throw $e;
    } 
    finally {
        unset($connection);
    }
}

function pdo_query_one($sql) {
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $connection = pdo_connection();
        $stmt = $connection->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }   
    catch(PDOException $e) {
        throw $e;
    }
    finally {
        unset($connection);
    }
}
function pdo_query_value($sql) {
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $connection = pdo_connection();
        $stmt = $connection->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row[0]);
    }   
    catch(PDOException $e) {
        throw $e;
    }
    finally {
        unset($connection);
    }
}
?>
