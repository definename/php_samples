<?php
    class Dish
    {
        public $name;
        public $ingredients = array();
        public function has_ingredient(string $ing) : bool
        {
            $ret = in_array($ing, $this->ingredients);
            return $ret;
        }
    }
?>