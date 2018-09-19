<?php
/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAssetLogin;
use yii\helpers\Html;

AppAssetLogin::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
	<head>
		<meta charset="<?= Yii::$app->charset ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="<?= Yii::$app->homeUrl; ?>img/favicon.ico" type="image/x-icon">
		<?php $this->registerCsrfMetaTags() ?>
		<title><?= Html::encode($this->title) ?></title>
		<script src="<?= Yii::$app->homeUrl; ?>js/jquery.min.js"></script>
		<script type="text/javascript">
			var homeUrl = '<?= Yii::$app->homeUrl; ?>';
		</script>
		<?php $this->head() ?>
	</head>
	<body class="hold-transition login-page">
		<?php $this->beginBody() ?>
		<div class="login-box">
			<!-- /.login-logo -->
			<div class="login-box-body">
				<div class="login-logo">
					<!--<img width="100" class="img-fluid" src="<?= Yii::$app->homeUrl; ?>img/logo2.jpg"/>-->
					<h1 style="color:red">Ayam Brand</h1>
				</div>
				<p class="login-box-msg">Dear user, log in to access the admin area!</p>
				<?= $content ?>
			</div>
			<!-- /.login-box-body -->
		</div>
		<?php $this->endBody() ?>
	</body>
</html>
<?php $this->endPage() ?>
