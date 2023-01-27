<?php

$heading = "Members";

$conn = pg_connect("host=localhost port=5432 dbname=logindb user=postgres password=ceac1234");

require("views/members-view.php");