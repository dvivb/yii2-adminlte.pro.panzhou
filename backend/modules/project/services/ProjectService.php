<?php

namespace backend\modules\project\services;
use yii\base\Object;
/**
 * Default controller for the `project` module
 */
class ProjectService{
    public function ProjectList(){
        $query = new Projects();
    }
}

