<?php

require ('../config/env.php');

class Todo
{
    public static function dbConnection() {
        $conn = mysqli_connect(DBSERVER, DBUSER, DBPASS, '00daw_todo');
        //$sql = "SELECT * FROM tareas";
        $row = mysqli_fetch_assoc($result);

        echo '<pre>';
        print_r($row);
        echo '<pre>';

        echo $row['tar_nombre'];
        return;
    }

    public static function createTodo() {
        self::dbConnection();
        $sql = "SELECT * FROM tareas";
        $result = mysqli_query($conn, $sql);
    }

    public static function updateTodo() {
    }

    public static function deleteTodo() {
    }
}

Todo::dbConnection();