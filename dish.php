<?php
    namespace Order;

    class Dish
    {
        private $name;
        protected $ingredients = array();

        public function __construct(string $name, array $ingredients)
        {
            $this->name = $name;
            $this->ingredients = $ingredients;
        }

        public function has_ingredient(string $ing) : bool
        {
            $ret = in_array($ing, $this->ingredients);
            return $ret;
        }
    }

    class ComboDish extends Dish
    {
        public function __construct(string $name, array $ingredients)
        {
            parent::__construct($name, $ingredients);
        }

        public function has_ingredient(string $ing) : bool
        {
            foreach ($this->ingredients as $dish) {
                if ($dish->has_ingredient($ing)) {
                    return true;
                }
            }
            return false;
        }
    }