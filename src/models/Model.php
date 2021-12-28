<?php

    class Model {
        protected static $tableName = '';
        protected static $columns = [];
        protected $values = [];

        function __construct($arr)
        {
            $this->loadFromArray($arr);
        }

        public function loadFromArray ($arr) {
            foreach($arr as $key => $value) {
                
            }
        }
    }

?>