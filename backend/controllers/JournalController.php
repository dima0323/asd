<?php

namespace backend\controllers;

use Yii;
use common\models\Journal;
use common\models\JournalSearch;
use common\models\Author;
use common\models\JournalAuthor;
use common\models\Image;
use backend\models\UploadImage;
use backend\models\SelectAuthors;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;

class JournalController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Journal::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
	
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {	
		$uploadForm = new UploadImage();
        $model = new Journal();
        $selectAuthors = new SelectAuthors();
		$authors = Author::find()->all();
        
        if ($model->load(Yii::$app->request->post()) && $selectAuthors->load(Yii::$app->request->post()) && $model->save()) {
            $journalAuthor = new JournalAuthor();
		    $journalAuthor->saveJA($selectAuthors,$model);
          
            $image = new Image();
            $image->journal_id = $model->id;
            $uploadForm->imageFile = UploadedFile::getInstance($uploadForm, 'imageFile');
            if($image->save()){
                $uploadForm->upload($image);
            }
            
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
				'uploadForm' => $uploadForm,
				'authors' => $authors,
				'selectAuthors' => $selectAuthors,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $uploadForm = new UploadImage();
        $selectAuthors = new SelectAuthors();
		$authors = Author::find()->all();    
        
        if ($model->load(Yii::$app->request->post()) && $selectAuthors->load(Yii::$app->request->post()) && $model->save()) {
            $journalAuthor = new JournalAuthor();
            $journalAuthor->saveJA($selectAuthors, $model);
            
            $uploadForm->imageFile = UploadedFile::getInstance($uploadForm, 'imageFile');
            if($uploadForm->imageFile)
                $uploadForm->upload($model->images);
            
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'uploadForm' => $uploadForm,
				'authors' => $authors,
				'selectAuthors' => $selectAuthors,
            ]);
        }
    }

    public function actionDelete($id)
    {    
        $this->findModel($id)->images->delete();
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Journal::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Не существует');
        }
    }
}
