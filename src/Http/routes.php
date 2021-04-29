<?php

use PhpGarlic\UEditor\Http\Controllers;

Route::any('ueditor/serve', Controllers\UeditorController::class.'@serve');
