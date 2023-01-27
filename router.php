<?php

$uri = parse_url(getPath($_SERVER['REQUEST_URI']))['path'];

//dd($uri);

$routes = [
    "/" => "controllers/auth.php",
    "/auth" => "controllers/auth.php",
    "/index.php" => "controllers/auth.php",
    "/home" => "controllers/home.php",
    "/members" => "controllers/members.php",
    "/post" => "controllers/post.php",
    "/friends" => "controllers/friends.php",
    "/profile" => "controllers/profile.php",
    "/message" => "controllers/message.php",
    "/media" => "controllers/media.php"
];

if (isset($_SESSION['authstate']) && $_SESSION['authstate'] == "accconn") {
    routeToController($uri, $routes);
} else {
    routeToController('/', $routes);
}