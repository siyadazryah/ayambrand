<?php

namespace backend\modules\outward\controllers;

use Yii;
use common\models\OutwardHeader;
use common\models\OutwardHeaderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\models\OutwardParty;
use common\models\OutwardCargo;
use common\models\OutwardContainerDetails;
use common\models\OutwardInTrans;
use common\models\OutwardRefDocument;
use common\models\OutwardInvoice;
use common\models\OutwardItem;
use common\models\OutwardSummary;

/**
 * LicencingMasterController implements the CRUD actions for LicencingMaster model.
 */
class OutwardController extends Controller {

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
        $searchModel = new OutwardHeaderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionHeader($id = NULL) {
        $model = OutwardHeader::findOne($id);
        if (empty($model)) {
            $model = new OutwardHeader();
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
            $import_data->saveAs(Yii::$app->basePath . '/../uploads/outward/header/data/' . $model->id . '.' . $import_data->extension);
        }
        return TRUE;
    }

    public function actionParty($id) {
        $model = OutwardParty::find()->where(['header_id' => $id])->one();
        if (empty($model)) {
            $model = new OutwardParty();
        }
        if ($model->load(Yii::$app->request->post()) && Yii::$app->SetValues->Attributes($model)) {
            $model->declarant_id = Yii::$app->request->post()['OutwardParty']['declarant_id'];
            $model->importer_id = Yii::$app->request->post()['OutwardParty']['importer_id'];
            $model->frieght_forwarder_id = Yii::$app->request->post()['OutwardParty']['frieght_forwarder_id'];
            $model->inward_agent_id = Yii::$app->request->post()['OutwardParty']['inward_agent_id'];
            $model->claimant_party_id = Yii::$app->request->post()['OutwardParty']['claimant_party_id'];
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
        $model = OutwardCargo::find()->where(['header_id' => $id])->one();
        $container_model = new OutwardContainerDetails();
        if (empty($model)) {
            $model = new OutwardCargo();
            $model->setScenario('create');
        } else {
            $container_detail_ = $model->container_detail;
            $searchModel = new \common\models\OutwardContainerDetailsSearch();
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
            $model->release_location = Yii::$app->request->post()['OutwardCargo']['release_location'];
            $model->receipt_location = Yii::$app->request->post()['OutwardCargo']['receipt_location'];
            if ($model->validate() && $model->save()) {
                if ($container_model->load(Yii::$app->request->post())) {
                    OutwardContainerDetails::conter_details($id, $model->id);
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
        $header = $this->findModel($id);
        $model = OutwardInTrans::find()->where(['header_id' => $id])->one();
        if (empty($model)) {
            $model = new OutwardInTrans();
        }
        $model->mode = $header->inward_transport_mode;
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
        $model = new OutwardRefDocument();
        $model->setScenario('create');
        $documents = OutwardRefDocument::find()->where(['status' => 1, 'header_id' => $id])->all();
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

    public function actionDocument($id) {
        $doc = OutwardRefDocument::findOne($id);
        return $this->render('doc_view', [
                    'doc' => $doc,
        ]);
    }

    public function actionInvoice($id) {
//        $model = Invoice::find()->where(['header_id' => $id])->one();
        $model = new OutwardInvoice();
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

    public function actionInvoiceSummary($id) {
        $searchModel = new \common\models\OutwardInvoiceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['header_id' => $id]);

        return $this->render('invoice_summary', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'id' => $id,
        ]);
    }

    public function actionItem($id) {
        $model = new OutwardItem();
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
        $searchModel = new \common\models\OutwardItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['header_id' => $id]);

        return $this->render('item_summary', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'id' => $id,
        ]);
    }

    public function actionItemDelete($item_id) {
        $model = OutwardItem::findOne($item_id);
        $header = $model->header_id;
        $model->delete();
        return $this->redirect(['item-summary', 'id' => $header]);
    }

    public function actionSummary($id) {
        $query = OutwardItem::find();
        $query->where(['status' => 1, 'header_id' => $id]);
        $model = OutwardSummary::find()->where(['header_id' => $id])->one();
        if (empty($model)) {
            $model = new OutwardSummary();
        }
        $model->no_of_items = $query->count();
        $model->cif_fob_value = $query->sum('cif_fob_value');
        $model->total_outer_pack = $query->sum('outer_pack_qty');
        $model->total_gst_amount = $query->sum('gst_amount');
        $model->excise_duty_amount = $query->sum('excise_duty');
        $model->customs_duty_amount = $query->sum('customs_duty');
        $model->total_gross_weight = OutwardSummary::findGross($id);
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
            $import_data->saveAs(Yii::$app->basePath . '/../uploads/outward/cargo/container/' . $model->id . '.' . $import_data->extension);
        }
        return TRUE;
    }

    /**
     * Upload Ref Code Documents.
     * @return mixed
     */
    public function uploadRefdoc($model, $import_data) {
        if (isset($import_data) && !empty($import_data)) {
            $import_data->saveAs(Yii::$app->basePath . '/../uploads/outward/reference_document/docs/' . $model->id . '.' . $import_data->extension);
        }
        return TRUE;
    }

    public function actionContainerDelete($id) {
        $model = OutwardContainerDetails::findOne($id);
        $header = $model->header_id;
        $model->delete();
        return $this->redirect(['cargo', 'id' => $header]);
    }

    public function actionAjaxNewParty() {
        if (Yii::$app->request->isAjax) {
            $data = $this->renderPartial('_new_party', [
            ]);
        }
        return $data;
    }

    public function actionAjaxAddClaiment() {
        if (Yii::$app->request->isAjax) {
            if (!empty($_POST['claiment_id']) && !empty($_POST['name_1']) && !empty($_POST['cr_uei']) && !empty($_POST['claiment_name'])) {
                $model = new \common\models\ClaimantParty();
                $model->claimant_id = $_POST['claiment_id'];
                $model->name1 = $_POST['name_1'];
                $model->name2 = $_POST['name_2'];
                $model->cr_uei = $_POST['cr_uei'];
                $model->claimant_name = $_POST['claiment_name'];

                if ($model->save()) {
                    echo json_encode(['msg' => 'success', 'claimant_id' => $model->claimant_id, 'name1' => $model->name1, 'name2' => $model->name2, 'cr_uei' => $model->cr_uei, 'claimant_name' => $model->claimant_name, 'id' => $model->id]);
                    exit;
                } else {
                    echo json_encode(['msg' => 'fail']);
                    exit;
                }
            }
        }
    }

    protected function findModel($id) {
        if (($model = OutwardHeader::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
