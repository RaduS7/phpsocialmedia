<?php require("components/header.php") ?>

<?php require("components/nav.php") ?>

<?php require("components/banner.php") ?>

<?php require("media-helper.php") ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

        <form action="media" class="mt-3" method="post">

            <h1 class='text-2xl font-bold my-4'> Books </h1>
            <div class="container" style="display: flex; justify-content: center; flex-direction: column;">
                <?php
                $query = "select * from books";
                $result = pg_query($conn, $query);

                while ($row = pg_fetch_row($result)) {
                    ?>

                    <button class="btn ml-2 py-0 mt-2" style="" type="submit" name="book" value="<?= $row[0] ?>">
                        <div class="card bg-light p-2 my-2">
                            <h2> <?= $row[1] ?> </h2>
                        </div>
                    </button>

                    <?php
                }
                ?>
            </div>

            <h1 class='text-2xl font-bold my-4'> Movies </h1>
            <div class="container" style="display: flex; justify-content: center; flex-direction: column;">
                <?php
                $query = "select * from movies";
                $result = pg_query($conn, $query);

                while ($row = pg_fetch_row($result)) {
                    ?>

                    <button class="btn ml-2 py-0 mt-2" style="" type="submit" name="movie" value="<?= $row[0] ?>">
                        <div class="card bg-light p-2 my-2">
                            <h2> <?= $row[1] ?> </h2>
                        </div>
                    </button>

                    <?php
                }
                ?>
            </div>

            <h1 class='text-2xl font-bold my-4'> Games </h1>
            <div class="container" style="display: flex; justify-content: center; flex-direction: column;">
                <?php
                $query = "select * from games";
                $result = pg_query($conn, $query);

                while ($row = pg_fetch_row($result)) {
                    ?>

                    <button class="btn ml-2 py-0 mt-2" style="" type="submit" name="game" value="<?= $row[0] ?>">
                        <div class="card bg-light p-2 my-2">
                            <h2> <?= $row[1] ?> </h2>
                        </div>
                    </button>

                    <?php
                }
                ?>
            </div>
        </form>
</main>

<?php require("components/footer.php") ?>