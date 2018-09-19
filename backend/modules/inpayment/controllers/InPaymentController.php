<?php

namespace backend\modules\inpayment\controllers;

use Yii;
use common\models\Header;
use common\models\HeaderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\models\Party;
use common\models\Cargo;
use common\models\ContainerDetails;
use common\models\InTrans;
use common\models\RefDocument;
use common\models\Invoice;
use common\models\Item;
use common\models\Summary;

/**
 * LicencingMasterController implements the CRUD actions for LicencingMaster model.
 */
class InPaymentController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all LicencingMaster models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new HeaderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionHeader($id = NULL) {
        $model = Header::findOne($id);
        if (empty($model)) {
            $model = new Header();
            $model->setScenario('create');
        } else {
            $import_data_ = $model->import_data;
        }

        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
            $import_data = UploadedFile::getInstance($model, 'import_data');
            if (!empty($import_data)) {
                $model->import_data = $import_data->extension;
            } else {
                $model->import_data = $import_data_;
            }
            if ($model->validate() && $model->save()) {
                $this->uploadHeader($model, $import_data);
            }
            return $this->redirect(['header', 'id' => $model->id]);
        } else {
            return $this->render('header', [
                        'model' => $model,
                        'id' => $id,
            ]);
        }
    }

    /**
     * Upload Header Documents.
     * @return mixed
     */
    public function uploadHeader($model, $import_data) {
        if (isset($import_data) && !empty($import_data)) {
            $import_data->saveAs(Yii::$app->basePath . '/../uploads/inpayment/header/data/' . $model->id . '.' . $import_data->extension);
        }
        return TRUE;
    }

    public function actionParty($id) {
        $model = Party::find()->where(['header_id' => $id])->one();
        if (empty($model)) {
            $model = new Party();
        }
        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
            $model->declarant_id = Yii::$app->request->post()['Party']['declarant_id'];
            $model->importer_id = Yii::$app->request->post()['Party']['importer_id'];
            $model->frieght_forwarder_id = Yii::$app->request->post()['Party']['frieght_forwarder_id'];
            $model->inward_agent_id = Yii::$app->request->post()['Party']['inward_agent_id'];
            $model->claimant_party_id = Yii::$app->request->post()['Party']['claimant_party_id'];
            $model->header_id = $id;
            $model->save();
            return $this->redirect(['party', 'id' => $id]);
        } else {
            return $this->render('party', [
                        'model' => $model,
                        'id' => $id,
            ]);
        }
    }

    public function actionCargo($id) {
        $model = Cargo::find()->where(['header_id' => $id])->one();
        $container_model = new ContainerDetails();
        if (empty($model)) {
            $model = new Cargo();
            $model->setScenario('create');
        } else {
            $container_detail_ = $model->container_detail;
            $searchModel = new \common\models\ContainerDetailsSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->query->andWhere(['header_id' => $id, 'cargo_id' => $model->id]);
        }
        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
            $model->header_id = $id;
            $container_detail = UploadedFile::getInstance($model, 'container_detail');
            if (!empty($container_detail)) {
                $model->container_detail = $container_detail->extension;
            } else {
                $model->container_detail = $container_detail_;
            }
            $model->release_location = Yii::$app->request->post()['Cargo']['release_location'];
            $model->receipt_location = Yii::$app->request->post()['Cargo']['receipt_location'];
            if ($model->validate() && $model->save()) {
                if ($container_model->load(Yii::$app->request->post())) {
                    ContainerDetails::conter_details($id, $model->id);
                }
                $this->uploadCargo($model, $container_detail);
            }
            return $this->redirect(['cargo', 'id' => $id]);
        } else {
            return $this->render('cargo', [
                        'model' => $model,
                        'container_model' => $container_model,
                        'id' => $id,
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
            ]);
        }
    }

    public function actionInTrans($id) {
        $model = InTrans::find()->where(['header_id' => $id])->one();
        if (empty($model)) {
            $model = new InTrans();
        }
        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
            $model->header_id = $id;
            $model->save();
            return $this->redirect(['in-trans', 'id' => $id]);
        } else {
            return $this->render('in_trans', [
                        'model' => $model,
                        'id' => $id,
            ]);
        }
    }

    public function actionRefDocument($id) {
        $model = new RefDocument();
        $model->setScenario('create');
        $documents = RefDocument::find()->where(['status' => 1, 'header_id' => $id])->all();
        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
            $file = UploadedFile::getInstance($model, 'file');
            if (!empty($file)) {
                $model->file = $file->extension;
            }
            $model->header_id = $id;
            $model->save();
            if ($model->validate() && $model->save()) {
                $this->uploadRefdoc($model, $file);
            }
            return $this->redirect(['ref-document', 'id' => $id]);
        } else {
            return $this->render('ref_doc', [
                        'model' => $model,
                        'id' => $id,
                        'documents' => $documents,
            ]);
        }
    }

    public function actionInvoice($id) {
        $model = Invoice::find()->where(['header_id' => $id])->one();
        if (empty($model)) {
            $model = new Invoice();
        }
        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
            $model->header_id = $id;
            $model->save();
            return $this->redirect(['invoice', 'id' => $id]);
        } else {
            return $this->render('invoice', [
                        'model' => $model,
                        'id' => $id,
            ]);
        }
    }

    public function actionItem($id) {
        $model = new Item();
        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
            $model->header_id = $id;
            $model->save();
            return $this->redirect(['item', 'id' => $id]);
        } else {
            return $this->render('item', [
                        'model' => $model,
                        'id' => $id,
            ]);
        }
    }

    public function actionItemSummary($id) {
        $searchModel = new \common\models\ItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('item_summary', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'id' => $id,
        ]);
    }

    public function actionItemDelete($item_id) {
        $model = Item::findOne($item_id);
        $header = $model->header_id;
        $model->delete();
        return $this->redirect(['item', 'id' => $header]);
    }

    public function actionSummary($id) {
        $query = Item::find();
        $query->where(['status' => 1, 'header_id' => $id]);
        $model = new Summary();
        $model->no_of_items = $query->count();
        $model->cif_fob_value = $query->sum('cif_fob_value');
        $model->total_outer_pack = $query->sum('outer_pack_qty');
        $model->total_gst_amount = $query->sum('gst_amount');
        $model->excise_duty_amount = $query->sum('excise_duty');
        $model->customs_duty_amount = $query->sum('customs_duty');
        $model->total_gross_weight = Summary::findGross($id);
//        $query->sum('amount');
        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
            $model->header_id = $id;
            $model->save();
            return $this->redirect(['summary', 'id' => $id]);
        } else {
            return $this->render('summary', [
                        'model' => $model,
                        'id' => $id,
            ]);
        }
    }

    /**
     * Upload Cargo Documents.
     * @return mixed
     */
    public function uploadCargo($model, $import_data) {
        if (isset($import_data) && !empty($import_data)) {
            $import_data->saveAs(Yii::$app->basePath . '/../uploads/inpayment/cargo/container/' . $model->id . '.' . $import_data->extension);
        }
        return TRUE;
    }

    /**
     * Upload Ref Code Documents.
     * @return mixed
     */
    public function uploadRefdoc($model, $import_data) {
        if (isset($import_data) && !empty($import_data)) {
            $import_data->saveAs(Yii::$app->basePath . '/../uploads/inpayment/reference_document/docs/' . $model->id . '.' . $import_data->extension);
        }
        return TRUE;
    }

    public function actionContainerDelete($id) {
        $model = ContainerDetails::findOne($id);
        $header = $model->header_id;
        $model->delete();
        return $this->redirect(['cargo', 'id' => $header]);
    }

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

    public function actionFindItem() {
        if (Yii::$app->request->isAjax) {

            $keyword = $_POST['keyword'];
            $dropdown = $_POST['dropdown'];
            $values = "";

            if ($keyword != '' || !empty($keyword)) {
                $results = \common\models\ItemMaster::find()->select('code')->where(['status' => 1])->andWhere((['like', 'code', $keyword]))->all();
                if ($results)
                    $values = $this->renderPartial('_item_master', ['results' => $results, 'dropdown' => $dropdown]);
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
            $sizes = \common\models\Size::find()->where(['status' => 1])->all();
            $size_field = '';
            if ($sizes) {
                foreach ($sizes as $size) {
                    $size_field .= "<option value = " . $size->id . ">" . $size->size_name . "</option>";
                }
            }
            $field = '<tr id="td_' . $keyword . '"><td><input type="text"class="form-control" name="ContainerDetails[container_no][]"></td>
                    <td><select class="form-control" name="ContainerDetails[size_type][]">
                            <option >Select</option>' . $size_field . '</select></td>
                    <td><input type="text" class="form-control" name="ContainerDetails[weight][]"></td>
                    <td><input type="text" class="form-control" name="ContainerDetails[seal_no][]"></td>
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

    protected function findModel($id) {
        if (($model = Header::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
