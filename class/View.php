<?php
class View {

    public static function render($viewPath,$viewData = [])
    {
        extract($viewData);

        echo "\n<!-- ".$viewPath.'.php' . " -->\n";
        include Config::VIEW_FOLDER.$viewPath.'.php';
        echo "\n<!-- $viewPath  END -->\n";
    }

}