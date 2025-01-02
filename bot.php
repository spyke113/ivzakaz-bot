<?php

require_once __DIR__ . '/bootstrap.php';

use SergiX44\Nutgram\Nutgram;
use App\Commands\StartCommand;
use App\Commands\OrderCommand;
use App\Commands\StatusCommand;

$bot = app(Nutgram::class);

$bot->onCommand('start', StartCommand::class);
$bot->onCommand('order', OrderCommand::class);
$bot->onCommand('status', StatusCommand::class);

$bot->run();
