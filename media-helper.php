<?php

if (isset($_POST['book'])) {

    $conn = pg_connect("host=localhost port=5432 dbname=logindb user=postgres password=ceac1234");

    if ($conn) {
        $query = "select count(uid) from bregs where uid = $1";
        $res = pg_query_params($conn, $query, array($_SESSION['credentials'][1]));
        $row = pg_fetch_row($res);

        if ($res) {
            if ($row[0] == 0) {
                $query2 = "insert into bregs(bid, uid) values ($1, $2)";
                $res2 = pg_query_params($conn, $query2, array($_POST['book'], $_SESSION['credentials'][1]));
            } else {
                $query2 = "delete from bregs where uid = ($1)";
                $res2 = pg_query_params($conn, $query2, array($_SESSION['credentials'][1]));

                $query2 = "insert into bregs(bid, uid) values ($1, $2)";
                $res2 = pg_query_params($conn, $query2, array($_POST['book'], $_SESSION['credentials'][1]));
            }
        } else {
            echo pg_last_error($conn);
        }
    }
}

if (isset($_POST['movie'])) {

    $conn = pg_connect("host=localhost port=5432 dbname=logindb user=postgres password=ceac1234");

    if ($conn) {
        $query = "select count(uid) from mregs where uid = $1";
        $res = pg_query_params($conn, $query, array($_SESSION['credentials'][1]));
        $row = pg_fetch_row($res);

        if ($res) {
            if ($row[0] == 0) {
                $query2 = "insert into mregs(mid, uid) values ($1, $2)";
                $res2 = pg_query_params($conn, $query2, array($_POST['movie'], $_SESSION['credentials'][1]));
            } else {
                $query2 = "delete from mregs where uid = ($1)";
                $res2 = pg_query_params($conn, $query2, array($_SESSION['credentials'][1]));

                $query3 = "insert into mregs(mid, uid) values ($1, $2)";
                $res3 = pg_query_params($conn, $query3, array($_POST['movie'], $_SESSION['credentials'][1]));
            }
        } else {
            echo pg_last_error($conn);
        }
    }
}

if (isset($_POST['game'])) {

    $conn = pg_connect("host=localhost port=5432 dbname=logindb user=postgres password=ceac1234");

    if ($conn) {
        $query = "select count(uid) from gregs where uid = $1";
        $res = pg_query_params($conn, $query, array($_SESSION['credentials'][1]));
        $row = pg_fetch_row($res);

        if ($res) {
            if ($row[0] == 0) {
                $query2 = "insert into gregs(gid, uid) values ($1, $2)";
                $res2 = pg_query_params($conn, $query2, array($_POST['game'], $_SESSION['credentials'][1]));
            } else {
                $query2 = "delete from gregs where uid = ($1)";
                $res2 = pg_query_params($conn, $query2, array($_SESSION['credentials'][1]));

                $query3 = "insert into gregs(gid, uid) values ($1, $2)";
                $res3 = pg_query_params($conn, $query3, array($_POST['game'], $_SESSION['credentials'][1]));
            }
        } else {
            echo pg_last_error($conn);
        }
    }
}