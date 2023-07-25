<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Offer;
use app\models\Image;

$offers = Offer::find()->orderBy(['created_at' => SORT_DESC])->limit(8)->all();
?>

<section class="tickets-list">
    <h2 class="visually-hidden">Самые новые предложения</h2>
    <div class="tickets-list__wrapper">
        <div class="tickets-list__header">
            <p class="tickets-list__title">Самое свежее</p>
        </div>
        <ul>
            <?php foreach ($offers as $offer) : ?>
                <li class="tickets-list__item">
                    <div class="ticket-card">
                        <div class="ticket-card__img">
                            <?= Html::img($offer->images[0]->image_path, ['srcset' => $offer->images[0]->image_path . ' 2x', 'alt' => 'Изображение товара']) ?>
                        </div>
                        <div class="ticket-card__info">
                            <span class="ticket-card__label"><?= Html::encode($offer->type) ?></span>
                            <div class="ticket-card__categories">
                                <?php foreach ($offer->categories as $category) : ?>
                                    <?= Html::a(Html::encode($category->name), ['offers/category', 'id' => $category->id]) ?>
                                <?php endforeach; ?>
                            </div>
                            <div class="ticket-card__header">
                                <h3 class="ticket-card__title">
                                    <?= Html::a(Html::encode($offer->title), ['offers/view', 'id' => $offer->id]) ?>
                                </h3>
                                <p class="ticket-card__price">
                                    <span class="js-sum"><?= Html::encode($offer->price) ?></span> ₽
                                </p>
                            </div>
                            <div class="ticket-card__desc">
                                <p><?= Html::encode($offer->description) ?></p>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
