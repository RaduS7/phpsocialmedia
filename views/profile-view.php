<?php require("components/header.php") ?>

<?php require("components/nav.php") ?>

<?php require("components/banner.php") ?>

<?php require("profile-helper.php") ?>


<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

        <h1 class="text-2xl font-bold"> Profile of <?= $params['name'] ?> </h1>

        <?php

        $query = "select bid from bregs where uid = $1";
        $res = pg_query_params($conn, $query, array($params['id']));
        $row = pg_fetch_row($res);

        $query2 = "select btext from books where bid = $1";
        $res2 = pg_query_params($conn, $query2, array($row[0]));
        $row2 = pg_fetch_row($res2);

        $query3 = "select mid from mregs where uid = $1";
        $res3 = pg_query_params($conn, $query3, array($params['id']));
        $row3 = pg_fetch_row($res3);

        $query4 = "select mtext from movies where mid = $1";
        $res4 = pg_query_params($conn, $query4, array($row3[0]));
        $row4 = pg_fetch_row($res4);

        $query5 = "select gid from gregs where uid = $1";
        $res5 = pg_query_params($conn, $query5, array($params['id']));
        $row5 = pg_fetch_row($res5);

        $query6 = "select gtext from games where gid = $1";
        $res6 = pg_query_params($conn, $query6, array($row5[0]));
        $row6 = pg_fetch_row($res6);

        ?>

        <div class="container card bg-light my-5">
            <h3 class="card p-2 my-3 text-xl font-bold"> Favourite Book: <?= isset($row2[0]) ? $row2[0] : "none selected" ?>
            </h3>
            <h3 class="card p-2 my-3 text-xl font-bold"> Favourite Movie: <?= isset($row4[0]) ? $row4[0] : "none selected" ?>
            </h3>
            <h3 class="card p-2 my-3 text-xl font-bold"> Favourite Game: <?= isset($row6[0]) ? $row6[0] : "none selected" ?></h3>
        </div>

    </div>
</main>

<?php require("components/footer.php") ?>