<?php
//$model['id_user'];

use \kartik\rating\StarRating;
use yii\web\JsExpression;

    // Fractional star rating with 6 stars , custom star symbol (uses glyphicon heart),
    // custom captions, and customizable ranges.
    echo \kartik\rating\StarRating::widget(['name' => 'rating_19',
   // 'value'=> $_produto['rating'],
    'pluginOptions' => [
    'stars' => 5,
    'min' => 0,
    'max' => 5,
    'step' => 0.5,
    'filledStar' => '<i class="glyphicon glyphicon-heart"></i>',
    'emptyStar' => '<i class="glyphicon glyphicon-heart-empty"></i>',
    'defaultCaption' => '{rating} hearts',
    'starCaptions' => new JsExpression("function(val){return val == 1 ? 'One heart' : val + ' hearts';}")
    ],
      /*  'pluginEvents'=>[
        'rating:change'=>"function(event,value,caption){
        $.ajax({
        url:'product/_rating', 
        method: 'post',
        data:{
        star:value,
        id:".$_produto['id_produto'].",
        id_user:".$detalhes['id_user']."
        },
        dataType: 'Json',
        success: function(data){
                    location.reload();
        })}"
        ]*/
    ]);


