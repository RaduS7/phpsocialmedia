<?php

$heading = "Profiles";

$conn = pg_connect("host=localhost port=5432 dbname=logindb user=postgres password=ceac1234");

require("views/profile-view.php");