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
		
			foreach ($selectAuthors->authors as $author) {
				$journalAuthor = new JournalAuthor();
				$journalAuthor->author_id = $author;
				$journalAuthor->journal_id =  $model->id;	
                $journalAuthor->save();  
			}
            
          
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
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            if($uploadForm->load(Yii::$app->request->post())){
                $image = new Image();
                $image->journal_id = $model->id;
                $image->id = $model->images[0]->id;
                $uploadForm->imageFile = UploadedFile::getInstance($uploadForm, 'imageFile');
                $uploadForm->upload($image);
            }
            
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
        $image = new Image();
        $image->afterDelete($this->findModel($id));
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Journal::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionYourActionAdd()
    { 
        $model = new Author;
        $model->save(false);
        return $this->actionCreate();
    }

    public function actionYourActionRemove($id)
    {
        Author::findOne($id)->delete();
        return $this->actionCreate();
    }
}
