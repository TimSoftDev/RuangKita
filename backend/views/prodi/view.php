<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->nama;

$nama = common\models\Fakultas::find()->where(['id' => $model->id_fakultas])->one();
?>
<div class="main">
    <p>
        <?= Html::a('Perbarui', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
        
            [
                'label' => 'Fakultas',
                'value' => $nama->nama,
            ],
            'nama',
        ],
    ]) ?>

</div>
