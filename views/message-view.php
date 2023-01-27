<?php require("components/header.php") ?>

<?php require("components/nav.php") ?>

<?php require("components/banner.php") ?>

<?php require("message-helper.php") ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

        <h1 class="text-2xl font-bold"> Message <?= $params['name'] ?> </h1>

        <div class="container" style="display: flex; justify-content: center;">

            <form action="message<?='?id=' . $params['id'] . "&name=" . $params['name'] ?>" class="mt-3" method="post">

                <div class="form-group mt-3">

                    <div style="overflow-y: scroll; height: 200px;">

                        <?php

                        $fid;

                        if ($conn) {
                            $query = "select fid from friends where (friend1 = $1 and friend2 = $2) or (friend1 = $2 and friend2 = $1)";
                            $res = pg_query_params($conn, $query, array($_SESSION['credentials'][1], $params['id']));
                            $row = pg_fetch_row($res);

                            $fid = $row[0];

                            $query2 = "select sender, msg from messages where fid = ($1)";
                            $res2 = pg_query_params($conn, $query2, array($row[0]));

                            if ($res2) {
                                while ($row2 = pg_fetch_row($res2)) {
                                    $query3 = "select username from users where uid = ($1)";
                                    $res3 = pg_query_params($conn, $query3, array($row2[0]));
                                    $row3 = pg_fetch_row($res3);

                                    ?>
                                    <div class="card bg-light p-1 my-2">
                                        <p class="font-bold"> <?= $row3[0] ?> </p>
                                        <p> <?= $row2[1] ?></p>
                                    </div>
                                    <?php
                                }
                            } else {
                                echo pg_last_error($conn);
                            }
                        }

                        ?>
                    </div>

                </div>

                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="msg" placeholder="Message">
                </div>

                <button class="btn btn-info bg-info  my-2" type="submit"
                    value="<?= $fid . ' ' . $_SESSION['credentials'][1] ?>" name="sendmsg">Send</button>
            </form>
        </div>

    </div>
</main>

<?php require("components/footer.php") ?>