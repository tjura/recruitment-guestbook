<?php

namespace app\queries;

use app\models\Post;

/**
 * This is the ActiveQuery class for [[\app\models\Post]].
 *
 * @see \app\models\Post
 */
class PostQuery extends \yii\db\ActiveQuery
{
    /**
     * @return \app\models\Post[]
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    public function one($db = null): Post
    {
        return parent::one($db);
    }

    /**
     * Newest on top
     */
    public function defaultOrder(): self
    {
        return $this->orderBy(['id' => SORT_DESC]);
    }

}
