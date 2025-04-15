<?php
require_once "../app/core/autoloader.php";

use App\Components\Layout\Head;
use App\Components\Layout\Header;
use App\Components\Layout\FlashMessage;
use App\Components\Form\createTask;

echo Head::render($title);
echo Header::render();
echo FlashMessage::render();
echo createTask::render($action);