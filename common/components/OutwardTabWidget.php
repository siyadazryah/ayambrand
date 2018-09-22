<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AppointmentWidget
 *
 * @author
 * JIthin Wails
 */

namespace common\components;

use Yii;
use yii\base\Widget;

class OutwardTabWidget extends Widget {

    public $id;
    public $step;

    public function init() {
        parent::init();
        if ($this->id === null) {
            return '';
        }
    }

    public function run() {
        return $this->render('outward_tab', [
                    'id' => $this->id,
                    'step' => $this->step,
        ]);
    }

}

?>
