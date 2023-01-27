<?php require("components/header.php") ?>

<?php require("components/nav.php") ?>

<?php require("components/banner.php") ?>

<?php require("post-helper.php") ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

        <h1 class='text-2xl font-bold my-3'> Your Friends' Posts </h1>        

        <h3 class='text-xl font-bold my-2'> Topics </h3>        
        <form action="home" class="mt-3" method="post">        

        <button class="btn btn-primary bg-primary" type="submit" name="filter" value="information">information</button>
        <button class="btn btn-primary bg-primary" type="submit" name="filter" value="meetups">meetups</button>
        <button class="btn btn-primary bg-primary" type="submit" name="filter" value="jokes">jokes</button>
        <button class="btn btn-primary bg-primary" type="submit" name="filter" value="all">all</button>

        <div class="container my-2" style="display: flex; justify-content: center; flex-direction: column;">
            <?php

            if ($conn) {
                $query = "select * from posts inner join friends on (friend1 = $1 and friend2 = uid) or (friend1 = uid and friend2 = $1)".$querryFilter;
                $result = pg_query_params($conn, $query, array($_SESSION['credentials'][1]));

                $ct = 0;

                while ($row = pg_fetch_row($result)) {
                    $query2 = "select username from users where uid = $1";
                    $result2 = pg_query_params($conn, $query2, array($row[1]));
                    $row2 = pg_fetch_row($result2);

                    $query3 = "select count(lid) from likes where pid = $1";
                    $result3 = pg_query_params($conn, $query3, array($row[0]));
                    $row3 = pg_fetch_row($result3);

                    $query4 = "select topictxt from topics where tid = ($1)";
                    $result4 = pg_query_params($conn, $query4, array($row[4]));
                    $row4 = pg_fetch_row($result4);
                    ?>

                    <?=($ct % 4 == 0) ? "<div style='display: flex; justify-content: space-around; flex-wrap: wrap;'>" : "" ?>
                    <div class="card my-2">
                        <div class="card-body">
                            <h3 class="text-l font-italic"> <?= $row2[0] ?> </h3>
                            <div class="card my-1 bg-light">
                                <div class="card-body">
                                    <h2 class='text-2xl font-bold'>
                                        <?= $row[2] ?>
                                    </h2>
                                    <p>
                                        <?= $row[3] ?>
                                    </p>
                                    <div style="display: flex; justify-content: right;">
                                        <p> <?= $row3[0] ?> </p>
                                        <button class="btn btn-outline-danger ml-2"
                                            style="height: 25px; width: 25px; padding: 0;"
                                            value=<?= $row[0] ?> name="likepost"> ❤️
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <h3 class="text-l font-italic text-info"> <?= $row4[0] ?> </h3>
                        </div>
                    </div>
                    <?=($ct % 4 == 3) ? "</div>" : "" ?>
                    <?php

                    $ct = $ct + 1;

                }

            } else {
                echo "<h1 class='text-2xl font-bold'> Can't display table! </h1>";
            }
            ?>
        </div>
        </form>
</main>

<?php require("components/footer.php") ?>