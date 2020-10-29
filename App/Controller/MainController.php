<?php

namespace App\Controller;

use App\View\StandardView;
use App\View\AbstractView;

class MainController
{
    
    public function home():
    {

        return new StandardView(
            ['body/home']
        );
    }
}