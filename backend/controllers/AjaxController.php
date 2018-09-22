<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\db\Expression;

class AjaxController extends \yii\web\Controller {

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionIndex() {
        return $this->render('index');
    }

    /*
     * This function set gender value in session variable
     * And also find characters based on gender type
     * return result to the view
     */

    public function actionSearchKeyword() {
        if (Yii::$app->request->isAjax) {

            $keyword = $_POST['keyword'];
            $dropdown = $_POST['dropdown'];
            $type = $_POST['type'];
            $values = "";

            if ($keyword != '' || !empty($keyword)) {
                $results = \common\models\Agents::find()->select('code')->where(['status' => 1, 'agent_type' => $type])->andWhere((['like', 'code', $keyword]))->all();
                if ($results)
                    $values = $this->renderPartial('_agent_search', ['results' => $results, 'dropdown' => $dropdown]);
                return $values;
            }
        }
    }

    public function actionSearchAgent() {
        if (Yii::$app->request->isAjax) {

            $keyword = $_POST['id'];

            if ($keyword != '' || !empty($keyword)) {
                $results = \common\models\Agents::find()->where(['status' => 1, 'code' => $keyword])->one();
                echo json_encode(['msg' => 'success', 'name1' => $results->name1, 'name2' => $results->name2, 'cruei' => $results->cr_uei, 'id' => $results->id, 'code' => $results->code]);
                exit;
            }
        }
    }

    public function actionSearchClaimantkeyword() {
        if (Yii::$app->request->isAjax) {

            $keyword = $_POST['keyword'];
            $values = "";

            if ($keyword != '' || !empty($keyword)) {
                $results = \common\models\ClaimantParty::find()->where(['status' => 1])->andWhere((['like', 'claimant_id', $keyword]))->all();
                if ($results)
                    $values = $this->renderPartial('_claimant_search', ['results' => $results]);
                return $values;
            }
        }
    }

    public function actionSearchClaimant() {
        if (Yii::$app->request->isAjax) {

            $keyword = $_POST['id'];

            if ($keyword != '' || !empty($keyword)) {
                $results = \common\models\ClaimantParty::find()->where(['status' => 1, 'claimant_id' => $keyword])->one();
                echo json_encode(['msg' => 'success', 'name1' => $results->name1, 'name2' => $results->name2, 'cruei' => $results->cr_uei, 'id' => $results->id, 'claimant_name' => $results->claimant_name, 'claimant_id' => $results->claimant_id]);
                exit;
            }
        }
    }

    public function actionSearchLocationkeyword() {
        if (Yii::$app->request->isAjax) {

            $keyword = $_POST['keyword'];
            $dropdown = $_POST['dropdown'];
            $values = "";

            if ($keyword != '' || !empty($keyword)) {
                $results = \common\models\Location::find()->select('location_code')->where(['status' => 1])->andWhere((['like', 'location_code', $keyword]))->all();
                if ($results)
                    $values = $this->renderPartial('_location_search', ['results' => $results, 'dropdown' => $dropdown]);
                return $values;
            }
        }
    }

    public function actionSearchLocation() {
        if (Yii::$app->request->isAjax) {

            $keyword = $_POST['id'];

            if ($keyword != '' || !empty($keyword)) {
                $results = \common\models\Location::find()->where(['status' => 1, 'location_code' => $keyword])->one();
                echo json_encode(['msg' => 'success', 'location_name' => $results->location_name, 'id' => $results->id, 'location_code' => $results->location_code]);
                exit;
            }
        }
    }

    public function actionMoreContainer() {
        if (Yii::$app->request->isAjax) {
            $keyword = $_POST['keyword'];
            $form = $_POST['form'];
            $sizes = \common\models\Size::find()->where(['status' => 1])->all();
            $size_field = '';
            if ($sizes) {
                foreach ($sizes as $size) {
                    $size_field .= "<option value = " . $size->id . ">" . $size->size_name . "</option>";
                }
            }
            $field = '<tr id="td_' . $keyword . '"><td><input type="text"class="form-control" name="' . $form . '[container_no][]"></td>
                    <td><select class="form-control" name="' . $form . '[size_type][]">
                            <option >Select</option>' . $size_field . '</select></td>
                    <td><input type="text" class="form-control" name="' . $form . '[weight][]"></td>
                    <td><input type="text" class="form-control" name="' . $form . '[seal_no][]"></td>
                    <td><a href="javascript:void(0)" class = "remScnt" id="' . $keyword . '">Remove</a></td>
                    </tr>';
            echo json_encode(['msg' => 'success', 'content' => $field]);
            exit;
        }
    }

    public function actionTermName() {
        if (Yii::$app->request->isAjax) {
            $val = $_POST['val'];
            $term = \common\models\TermType::findOne($val);
            echo json_encode(['msg' => 'success', 'name' => $term->term_name, 'freight' => $term->freight_charge, 'insurance' => $term->insurance_charge]);
            exit;
        }
    }

    public function actionExchangeRate() {
        if (Yii::$app->request->isAjax) {
            $val = $_POST['val'];
            $term = \common\models\Currency::findOne($val);
            echo json_encode(['msg' => 'success', 'rate' => $term->exchange_rate]);
            exit;
        }
    }

    public function actionFindItem() {
        if (Yii::$app->request->isAjax) {

            $keyword = $_POST['keyword'];
            $dropdown = $_POST['dropdown'];
            $attr = $_POST['attr'];
            $values = "";

            if ($keyword != '' || !empty($keyword)) {
                $results = \common\models\ItemMaster::find()->select('code')->where(['status' => 1])->andWhere((['like', 'code', $keyword]))->all();
                if ($results)
                    $values = $this->renderPartial('_item_master', ['results' => $results, 'dropdown' => $dropdown, 'attr' => $attr]);
                return $values;
            }
        }
    }

    public function actionItemMaster() {
        if (Yii::$app->request->isAjax) {

            $keyword = $_POST['id'];

            if ($keyword != '' || !empty($keyword)) {
                $results = \common\models\ItemMaster::find()->where(['status' => 1, 'code' => $keyword])->one();
                $country = \common\models\Country::findOne($results->country_of_orgin)->name;
                echo json_encode(['msg' => 'success', 'description' => $results->description, 'id' => $results->id, 'country_of_orgin' => $country, 'brand' => $results->brand, 'code' => $results->code]);
                exit;
            }
        }
    }

}
