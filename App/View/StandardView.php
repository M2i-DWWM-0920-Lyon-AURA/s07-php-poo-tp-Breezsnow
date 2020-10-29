<?php

namespace App\View;

use App\View\AbstractView;

class StandardView extends AbstractView
{
    
    protected $templates, $variables;

   
    public function __construct(array $templates, array $variables = [])
    {
        $this->templates = $templates;
        $this->variables = $variables;
    }

    
    protected function renderHead(): void
    {
        include './templates/head.php';
        
    }

    
    protected function renderBody(): void
    {
    
        foreach ($this->variables as $varName => $value) 
        {
            $$varName = $value;
        }


        echo '<div class="container">' . PHP_EOL;
        echo '<main>' . PHP_EOL;
       
        foreach ($this->templates as $template) {
            include './templates/' . $template . '.php';
        }
        echo '</main>' . PHP_EOL;
        echo '</div>' . PHP_EOL;
    }
}
