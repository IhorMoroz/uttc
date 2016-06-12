<?php

namespace core\view;

class View
{
    private $data = [];

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function __isset($name)
    {
        return !empty($this->data[$name]);
    }

    public function render(string $template)
    {
        ob_start();
        foreach($this->data as $varname => $value) $$varname = $value;
        include __DIR__ . '\\templates\\' . $template;
        $content = ob_get_contents();
        ob_get_clean();
        return $content;
    }

    public function display(string $template)
    {
        echo $this->render($template);
    }
}