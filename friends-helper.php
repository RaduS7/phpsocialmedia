<?php

if (isset($_POST['addfriend'])) {

    $conn = pg_connect("host=localhost port=5432 dbname=logindb user=postgres password=ceac1234");

    if ($conn) {
        $query = "insert into friends(friend1, friend2) values ($1, $2)";
        $res = pg_query_params($conn, $query, array($_SESSION['credentials'][1], $_POST['addfriend']));

        if ($res) {

        } else {
            echo pg_last_error($conn);
        }
    }
}

if (isset($_POST['removefriend'])) {

    $conn = pg_connect("host=localhost port=5432 dbname=logindb user=postgres password=ceac1234");

    if ($conn) {
        $query = "select fid from friends where (friend1 = ($1) and friend2 = ($2)) or (friend1 = ($2) or friend2 = ($1))";
        $res = pg_query_params($conn, $query, array($_SESSION['credentials'][1], $_POST['removefriend']));
        $row = pg_fetch_row($res);

        $query2 = "delete from messages where fid = ($1)";
        $res2 = pg_query_params($conn, $query2, array($row[0]));

        $query3 = "delete from friends where fid = ($1)";
        $res3 = pg_query_params($conn, $query3, array($row[0]));

        // $query = "delete from friends where (friend1 = ($1) and friend2 = ($2)) or (friend1 = ($2) or friend2 = ($1))";
        // $res = pg_query_params($conn, $query, array($_SESSION['credentials'][1], $_POST['removefriend']));

        if ($res3) {

        } else {
            echo pg_last_error($conn);
        }
    }
}