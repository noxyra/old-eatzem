<?php
    class TypeTool{

        public static function genOptionType($db){
            $typeManager = new TypeManager($db);
            $typeList = $typeManager->getList();

            foreach ($typeList as $type){
                echo "<option value='".$type->id()."'>" . $type->type() . "</option>";
            }
        }

    }