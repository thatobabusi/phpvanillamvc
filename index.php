<?php

require "app/bootstrap.php";

use App\App\{Router, Request};

Router::load("routes/web.php")->redirect(Request::uri(), Request::method());
