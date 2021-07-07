<?php

namespace App\View;



abstract class AbstractView
{
    
    final public function render()
    {
        // Ecrit le contenu de la page
        echo '<!DOCTYPE html>' . PHP_EOL;
        echo '<html lang="fr">' . PHP_EOL;
        echo '<head>' . PHP_EOL;

        
        $this->renderHead();

        echo '</head>' . PHP_EOL;
        echo '<body>' . PHP_EOL;

        
        $this->renderBody();

        echo '</body>' . PHP_EOL;
        echo '</html>' . PHP_EOL;
    }

    abstract protected function renderHead(): void;
  
    abstract protected function renderBody(): void;
}
