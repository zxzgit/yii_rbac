<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */


if (Yii::$app->controller->action->id === 'login') {
/**
 * Do not use this code in your template. Remove it. 
 * Instead, use the code  $this->layout = '//main-login'; in your controller.
 */
    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else {

    if (class_exists('backend\assets\AppAsset')) {
        backend\assets\AppAsset::register($this);
    } else {
        app\assets\AppAsset::register($this);
    }

    dmstr\web\AdminLteAsset::register($this);

    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
    <?php $this->beginBody() ?>
    <div class="wrapper">

        <?= $this->render(
            'header.php',
            ['directoryAsset' => $directoryAsset]
        ) ?>

        <?= $this->render(
            'left.php',
            ['directoryAsset' => $directoryAsset]
        )
        ?>

        <?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>

    </div>

    <?php $this->endBody() ?>
    
    <script>
        //菜单选中。。。
        $(function(){
            var activeUrl = window.location.pathname;
            var $activeNode = $(".sidebar-menu").find("a[href='"+activeUrl+"']");
            if($activeNode.length == 0){
                activeUrl = sessionStorage.lastActiveUrl;
                $activeNode = $(".sidebar-menu").find("a[href='"+activeUrl+"']");
            }else{
                //最有一次点击的菜单url节点
                sessionStorage.lastActiveUrl = activeUrl;
            }
            var $activeLi = $activeNode.parent('li');
            var $activeLiParent = $activeLi.parents('li');
            $activeLi.addClass('active');
            $activeLiParent.addClass('active');
        });
    </script>
    
    </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>
