<?php

namespace app\core;

use app\core\Exceptions\ViewException;

class View
{
    private string $viewPath;
    
    public function foundView(string $view, array $data)
    {
        $this->viewPath = dirname(__FILE__, 2)."/views/pages/{$view}.php";
        
        if(!file_exists($this->viewPath)) {
            throw ViewException::fileExists();
        }

        $contentRender = $this->runRender($this->viewPath, $data);

        return $contentRender;
    }

    private function runRender(string $viewPath, array $data)
    {
        ob_start();

        extract($data);
        require $viewPath;

        $content = ob_get_contents();

        ob_end_clean();

        return $content;
    }
}