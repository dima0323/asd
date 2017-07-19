<?php

namespace frontend\controllers;

use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\data\Pagination;
use yii\web\Controller;
use common\models\Journal;
use common\models\Author;

class AuthorController extends Controller
{
    public function actionIndex($id = null)
    {
        $authors = Author::find();
        $authorsDataProvider = new ActiveDataProvider([
            'query' => $authors,
            'sort'=>array(
                    'defaultOrder'=>['surname' => SORT_ASC],
            ),
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $authorsDataProvider,
        ]); 
    }
}
