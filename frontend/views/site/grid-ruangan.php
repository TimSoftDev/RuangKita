<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\RuanganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tampilkan Grid';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-grid-ruangan">

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ruang',
            'waktu_mulai',
            'waktu_selesai',
            'status',
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
