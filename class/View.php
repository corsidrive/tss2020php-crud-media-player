<?php
class View {

    public static function render($viewPath,$viewData = [])
    {
        extract($viewData);

        echo "<!--" . Config::VIEW_FOLDER.$viewPath.'.php' . "-->";
        include Config::VIEW_FOLDER.$viewPath.'.php';
    }

}