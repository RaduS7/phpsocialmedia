<?php

$url_components = parse_url($_SERVER['REQUEST_URI']);
parse_str($url_components['query'], $params);

if (isset($_POST['sendmsg'])) {

    $ids = explode(' ', $_POST['sendmsg']);

    $conn = pg_connect("host=localhost port=5432 dbname=logindb user=postgres password=ceac1234");

    if ($conn) {
        $query = "insert into messages(fid, sender, msg) values ($1, $2, $3)";
        $res = pg_query_params($conn, $query, array($ids[0], $ids[1], $_POST['msg']));

        if ($res) {

        } else {
            echo pg_last_error($conn);
        }
    }
}