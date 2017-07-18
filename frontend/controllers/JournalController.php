<?php

namespace frontend\controllers;

use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\data\Pagination;
use yii\web\Controller;
use common\models\Journal;
use common\models\Author;

class JournalController extends Controller
{
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            Url::remember();
            return true;
        } else {
            return false;
        }
    }

    public function actionIndex($id = null)
    {
        $journals = Journal::find();

        $journalsDataProvider = new ActiveDataProvider([
            'query' => $journals,
            'pagination' => [
                'pageSize' => 4,
            ],
        ]);

        return $this->render('index', [
            'journals' => $journals,
            'journalsDataProvider' => $journalsDataProvider,
        ]);

    }

    public function actionView($id)
    {
        return $this->render('view',[
            'model'=>$this->findModel($id),
        ]);
    }
    
    private function findModel($id)
    {
        if(($model=Journal::findOne($id))!==null){
            return $model;
        }    
        else{
             throw new Exception("Не найдено!");
        }       
    }
}
