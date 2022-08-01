<?php
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
?>

<main>
<!--    <div class="product_block">-->
<!--        <select class="product_input">-->
<!--            --><?php
//                foreach ($products as $product) {
//                    echo '<option value="'. $product->id .'">'.$product->name.'</oprion>';                //ДЛЯ AJAX ЗАПРОСОВ
//                }
//            ?>
<!--        </select>-->
<!--        <input type="number" class="product_input" placeholder="Количество товара" id="amount">-->
<!--        <div class="product_btn" id="product_btn">Добавить</div>-->
<!--    </div>-->

    <?php
    $form = ActiveForm::begin(['options' => ['class' => 'product_block']]);
    $items = array();

    foreach ($products as $product) {
        $items = $items +[
                $product->id => $product->name
        ];
    }
    ?>

    <?= $form->field($model, 'product', ['options' => ['class' => 'product_input']])->label(false)->dropDownList($items)?>
    <?= $form->field($model, 'amount', ['options' => ['class' => 'product_input']])->label(false)->input('number', ['placeholder' => 'Количество товара'])?>
    <?= Html::submitButton('Добавить', ['class' => 'product_btn'])?>
    <?php ActiveForm::end()?>
</main>
<?php $this->registerJsFile('@web/js/add-product.js', ['depends' => 'yii\web\YiiAsset']) ?>