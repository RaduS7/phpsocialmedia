<?php require("components/header.php") ?>

<?php require("components/nav.php") ?>

<?php require("components/banner.php") ?>

<?php require("post-helper.php") ?>

<main>

    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

        <div class="container" style="display: flex; justify-content: space-around">

            <?php
            // echo "<h1 class='text-2xl font-bold'>" . $_SESSION['credentials'][0] . "</h1> <br>";
            // echo "<h1 class='text-2xl font-bold'>" . $_SESSION['credentials'][1] . "</h1> <br>";
            // echo "<h1 class='text-2xl font-bold'>" . $_SESSION['authstate'] . "</h1> <br>";
            ?>

            <form action="post" class="mt-3" method="post">
                <h3 class='text-2xl font-bold my-2'> Create Posts </h3>

                <div class="form-group mt-3">
                    <label class="font-bold">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title">
                </div>

                <div class="form-group">
                    <label class="font-bold">Content</label>
                    <textarea class="form-control" name="content" style="resize: none;" rows="4"
                        placeholder="..."></textarea>
                </div>

                <div>
                    <select class="custom-select" name="topic" id="topic">
                        <option selected value="information">information</option>
                        <option value="meetups">meetups</option>
                        <option value="jokes">jokes</option>
                    </select>
                </div>

                <button class="btn btn-info bg-info my-2" type="submit" value="Postcontent"
                    name="postcontent">Post</button>

            </form>

            <form action="post" class="mt-3" method="post">

                <div style="display: flex; justify-content: center; flex-direction: column;">

                    <h3 class='text-2xl font-bold my-2'> Your Posts </h3>

                    <?php
                    if ($conn) {

                        $query = "select * from posts where uid = ($1)";
                        $result = pg_query_params($conn, $query, array($_SESSION['credentials'][1]));

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
                                                <button disabled class="btn btn-outline-danger ml-2"
                                                    style="height: 25px; width: 25px; padding: 0;"> ❤️
                                                </button>
                                            </div>
                                            <div style="display: flex; justify-content: right;">
                                                <button class="btn btn-danger bg-danger ml-2 py-0 mt-2" style="" type="submit"
                                                    value=<?= $row[0] ?> name="deletepost"> Delete
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="text-l font-italic text-info"> <?= $row4[0] ?> </h3>
                                </div>
                            </div>
                        <?php }

                    } else {
                        echo "<h1 class='text-2xl font-bold'> Can't display table! </h1>";
                    }
                    ?>
                </div>
            </form>

        </div>
    </div>
</main>

<?php require("components/footer.php") ?>