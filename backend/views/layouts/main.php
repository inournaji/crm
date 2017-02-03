<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

$userid= Yii::$app->user->getId();
$userRole = Yii::$app->authManager->getRolesByUser($userid);

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Leasingdeal.de',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
    ];
    if (isset($userRole['admin']) ||isset($userRole['owner']) ) {
        $menuItems = [
            ['label' => 'Cars', 'url' => ['/car']],
        ];
    }
    if (isset($userRole['admin'])) {
        $menuItems [] = ['label' => 'Administration',
            'items' => [
                ['label' => 'Attachments', 'url' => ['/attachment']],
                ['label' => 'Customers', 'url' => ['/customer']],
                ['label' => 'Emails', 'url' => ['/email']],
                ['label' => 'Users', 'url' => ['/user']],
            ]
        ];
        $menuItems [] = ['label' => 'Settings',
            'items' => [
                ['label' => 'Roles managment', 'url' => ['/auth-item']],
                ['label' => 'Rules managment', 'url' => ['/auth-rule']],
                ['label' => 'User roles', 'url' => ['/auth-assignment']],
                ['label' => 'Customer types', 'url' => ['/customer-type']],
                ['label' => 'Car brands', 'url' => ['/viechle-brand']],
            ]
        ];
    }
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
