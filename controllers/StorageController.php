<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Category;
use app\models\Product;
use app\models\Storage;
use app\models\Journal;
use Yii;

class StorageController extends Controller {

    public $layout = 'storage';

    public function actionIndex() {

        $storage = Storage::find()->with('product0')->all();
        $categories = Category::find()->asArray()->all();
        $result = array();

        foreach ($storage as $item) {
            foreach ($categories as $category) {
                if ($category['id'] == $item->product0->category) {
                    array_push($result, [$item->product0->name, $category['name'], $item->amount]);
                    break;
                }
            }
        }

        return $this->render('index', ['result' => $result]);
    }

    public function actionJournal() {
        $journal = Journal::find()->with('product0')->orderBy(['id' => SORT_DESC])->all();
        $categories = Category::find()->asArray()->all();
        $result = array();

        foreach ($journal as $item) {
            foreach ($categories as $category) {
                if ($category['id'] == $item->product0->category) {
                    array_push($result, [date('d.m.Y', $item->date), $item->product0->name, $category['name'], $item->motion]);
                    break;
                }
            }
        }

        return $this->render('journal', ['result' => $result]);
    }

    public function actionAddProduct() {

        $products = Product::find()->all();
        $model = new Storage();

        if($model->load(Yii::$app->request->post())){
            if($model->validate()){
                $storage = Storage::find()->where(['=', 'product',  $model->product])->one();
                $journal = new Journal();

                $storage->amount = $storage->amount + $model->amount;
                $storage->save();


                $journal->date = time()+60*60*5;
                $journal->product = $model->product;
                $journal->motion = $model->amount;
                $journal->save();

                return $this->refresh();
            }
        }

        return $this->render('add-product', ['products' => $products, 'model' => $model]);
    }

    public function actionApiProduct($motion) {                                                 //ДЛЯ AJAX ЗАПРОСОВ
        if (Yii::$app->request->isAjax) {
            $storage = Storage::find()->where(['=', 'product',  $_POST['Product']])->one();
            $journal = new Journal();
            $amount = $_POST['Amount'];

            if ($motion === "del"){
                if ($storage->amount < $amount) {
                    return false;
                }
                $amount *= -1;
            }

            $storage->amount = $storage->amount + $amount;
            $storage->save();


            $journal->date = time()+60*60*5;
            $journal->product = $_POST['Product'];
            $journal->motion = $amount;
            $journal->save();

            return true;
        }
        return false;
    }

    public function actionDelProduct() {

        $products = Product::find()->all();
        $model = new Storage();

        if($model->load(Yii::$app->request->post())){
            if($model->validate()){
                $storage = Storage::find()->where(['=', 'product',  $model->product])->one();
                $journal = new Journal();

                if ($storage->amount > $model->amount) {
                    $model->amount *= -1;
                    $storage->amount = $storage->amount + $model->amount;
                    $storage->save();


                    $journal->date = time()+60*60*5;
                    $journal->product = $model->product;
                    $journal->motion = $model->amount;
                    $journal->save();

                    return $this->refresh();
                }
            }
        }

        return $this->render('del-product', ['products' => $products, 'model' => $model]);
    }
}