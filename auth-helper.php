<?php
$conn = pg_connect("host=localhost port=5432 dbname=logindb user=postgres password=ceac1234");

if (isset($_POST['verify']) && $_POST['verify'] == "Connect") {
    $user = $_POST['user'];
    $pwd = $_POST['pwd'];

    $authenticated = false;

    if ($conn) {
        $query = "select * from verify($1, $2)";
        $res = pg_query_params($conn, $query, array($user, $pwd));

        $result = pg_fetch_object($res);

        if ($result) {
            $authenticated = $result->verify == 1;
        }
    }

    if ($authenticated) {
        $_SESSION['authstate'] = "accconn";

        $query = "select uid from users where username = '${user}'";
        $res = pg_query($conn, $query);
        $row = pg_fetch_row($res);
        $id = $row[0];

        $_SESSION['credentials'] = [$user, $id];

    } else {
        echo pg_last_error($conn);
        $_SESSION['authstate'] = "accinvalid";
    }
}

if (isset($_POST['createaccount']) && $_POST['createaccount'] == "Create Account") {
    $user = $_POST['user'];
    $pwd = $_POST['pwd'];

    $exists = false;

    if ($conn) {

        $query = "select * from verify($1, $2)";
        $res = pg_query_params($conn, $query, array($user, $pwd));

        $result = pg_fetch_object($res);

        if ($result) {
            $exists = $result->verify == 1;
        }

        if (!$exists) {
            $query = "insert into users(username, password) values ($1, crypt($2, gen_salt('md5')))";
            $res = pg_query_params($conn, $query, array($user, $pwd));

            if ($res) {
                $_SESSION['authstate'] = "accconn";

                $query = "select uid from users where username = '${user}'";
                $res = pg_query($conn, $query);
                $row = pg_fetch_row($res);
                $id = $row[0];

                $_SESSION['credentials'] = [$user, $id];
            } else {
                echo pg_last_error($conn);
                $_SESSION['authstate'] = "accinvalid";
            }
        } else {
            echo pg_last_error($conn);
            $_SESSION['authstate'] = "accex";
        }
    }
}

if (isset($_POST['disconnect']) && $_POST['disconnect'] == "Disconnect") {
    $_SESSION['authstate'] = "accdisc";
    $_SESSION['credentials'] = [];
}

?>