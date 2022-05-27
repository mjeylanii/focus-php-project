<?php

namespace app\core\form;

use app\core\Model;

class Form
{
    public static function begin($action, $method)
    {
        $style = "rounded-md mt-2 p-5 w-50 mx-auto";
/*        echo sprintf("<form> class="%s" action="%s" method="%s">" $style, $action, $method);*/
      /*  echo '<pre>';
        var_dump( sprintf('< form > class = "%s" action = "%s" method = "%s" >', $style, $action, $method));
        echo '</pre>';*/
        return new Form();
    }

    public static function end()
    {
        echo "</form>";
    }

    public function field(Model $model, $attribute): Field
    {
        return new Field($model, $attribute);
    }
}