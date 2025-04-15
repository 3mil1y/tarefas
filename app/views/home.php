<?php
require_once "../app/core/autoloader.php";

use Components\Layout\Head;
use Components\Layout\Header;
use App\Components\Layout\FlashMessage;
use App\Components\Lists\TaskList;

echo Head::render($title);
echo Header::render();
echo FlashMessage::render();
echo TaskList::render($tasks);

