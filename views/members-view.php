<?php require("components/header.php") ?>

<?php require("components/nav.php") ?>

<?php require("components/banner.php") ?>

<?php require("friends-helper.php") ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

        <form action="members" method="post">
            <h1 class='text-2xl font-bold my-2'> Users </h1>
            <?php

            if ($conn) {

                $query = "select uid, username from users where uid != ($1) and uid not in
                (select uid from users inner join friends on (friend1 = ($1) and friend2 = uid) or (friend1 = uid and friend2 = ($1)))";
                $result = pg_query_params($conn, $query, array($_SESSION['credentials'][1]));

                ?>
                <table class='table table-striped'>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        while ($row = pg_fetch_row($result)) {
                            echo ("<tr>");

                            $id = -1;
                            $name = -1;
                            foreach ($row as $col_value => $row_value) {
                                if ($id == -1) {
                                    $id = $row_value;
                                } else if ($name == -1) {
                                    $name = $row_value;
                                }
                                echo ("<td>$row_value</td>");
                            }

                            ?>
                            <td>
                                <button class="btn btn-success bg-success my-2 mx-2" type="submit" value=<?= $id ?>
                                    name="addfriend">Add Friend</button>

                                <button onclick="location.href = '/socialmedia/profile?id=<?= $id ?>&name=<?= $name ?>'" ;
                                    class="btn btn-info bg-info my-2 mx-2" type="button" value=<?= $id ?> name="viewprofile">View
                                    Profile</button>
                            </td>
                            <?php

                            echo ("</tr>\n");
                        }

                        echo "</tbody>";
                        echo "</table>";
            } else {
                echo "<h1 class='text-2xl font-bold'> Can't display table! </h1>";
            }
            ?>
        </form>
    </div>
</main>

<?php require("components/footer.php") ?>