<?php

namespace App\Controllers;

use App\Models\ModelAdmin;

class Home extends BaseController
{
    public function index()
    {
        return (view('welcome_message.php'));
    }
}
