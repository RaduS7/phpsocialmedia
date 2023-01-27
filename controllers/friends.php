<?php

$heading = "Friends";

$conn = pg_connect("host=localhost port=5432 dbname=logindb user=postgres password=ceac1234");

if (isset($_POST['messageprofile'])) {
    dd($_POST['messageprofile']);
}

require("views/friends-view.php");