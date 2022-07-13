<?php

namespace app\controllers;

use app\models\Post;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;

class SiteController extends Controller
{

    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@', '?'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Displays posts with pagination.
     *
     * @return string
     */
    public function actionIndex(): string
    {
        $model = new Post();

        $this->create(post: $model);

        $dataProvider = new ActiveDataProvider(
            [
                'query' => Post::find()->defaultOrder(),
                'pagination' => ['pageSize' => 5],
            ],
        );

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Post creation handler
     * @param Post $post
     * @return void
     */
    private function create(Post &$post): void
    {
        if ($post->load(\Yii::$app->request->post()) && $post->save()) {
            $post = new Post();
        }
    }

}
