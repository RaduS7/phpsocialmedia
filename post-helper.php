<?php

$querryFilter = "";

if (isset($_POST['filter'])) {
    if ($_POST['filter'] == "information") {
        $querryFilter = "where tid = 1";
    }
    if ($_POST['filter'] == "meetups") {
        $querryFilter = "where tid = 2";
    }
    if ($_POST['filter'] == "jokes") {
        $querryFilter = "where tid = 3";
    }
    if ($_POST['filter'] == "all") {
        $querryFilter = "";
    }
}

if (isset($_POST['postcontent']) && $_POST['postcontent'] == "Postcontent") {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $conn = pg_connect("host=localhost port=5432 dbname=logindb user=postgres password=ceac1234");

    if ($conn) {
        $query = "select tid from topics where topictxt = ($1) ";
        $res = pg_query_params($conn, $query, array($_POST['topic']));

        if ($res) {
            $row = pg_fetch_row($res);

            $topicId = $row[0];

            $query2 = "insert into posts(uid, postTitle, postContent, tid) values ($1, $2, $3, $4)";
            $res2 = pg_query_params($conn, $query2, array($_SESSION['credentials'][1], $title, $content, $topicId));

            if ($res2) {

            } else {
                echo pg_last_error($conn);
            }
        } else {
            echo pg_last_error($conn);
        }
    }
}

if (isset($_POST['deletepost'])) {

    $conn = pg_connect("host=localhost port=5432 dbname=logindb user=postgres password=ceac1234");

    if ($conn) {

        $query = "delete from likes where pid = ($1)";
        $res = pg_query_params($conn, $query, array($_POST['deletepost']));

        $query2 = "delete from posts where pid = ($1)";
        $res2 = pg_query_params($conn, $query2, array($_POST['deletepost']));

        if ($res) {

        } else {
            echo pg_last_error($conn);
        }

        // header("Refresh:0");
    }
}

if (isset($_POST['likepost'])) {

    $conn = pg_connect("host=localhost port=5432 dbname=logindb user=postgres password=ceac1234");

    if ($conn) {
        $query = "select count(uid) from likes where pid = ($1) and uid = ($2)";
        $res = pg_query_params($conn, $query, array($_POST['likepost'], $_SESSION['credentials'][1]));
        $row = pg_fetch_row($res);

        if ($row[0] == 0) {
            $query2 = "insert into likes(pid, uid) values ($1, $2)";
            $res2 = pg_query_params($conn, $query2, array($_POST['likepost'], $_SESSION['credentials'][1]));

            if ($res) {

            } else {
                echo pg_last_error($conn);
            }
        } else {
            $query2 = "delete from likes where pid = ($1) and uid = ($2)";
            $res2 = pg_query_params($conn, $query2, array($_POST['likepost'], $_SESSION['credentials'][1]));

            if ($res) {

            } else {
                echo pg_last_error($conn);
            }
        }

        // header("Refresh:0");
    }
}