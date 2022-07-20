<?php
/**
 * @var Post[] $models
 * @var Paginator $paginator
 */

use app\database\Paginator;
use app\models\Post;
use app\widgets\Pager;

?>

<main>
    <div class="px-4 py-5 my-5 text-center">
        <h1 class="display-5 fw-bold">Guestbook</h1>
        <div class="col-lg-6 mx-auto">

            <table class="table">
                <tr>
                    <th>Author</th>
                    <th>Content</th>
                    <th>Date</th>
                </tr>
                <?php foreach ($models as $model): ?>
                    <tr>
                        <td><?= $model->getUsername() ?></td>
                        <td><?= $model->getContent() ?></td>
                        <td><?= $model->getCreatedAt() ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <?php (new Pager($paginator))->render() ?>
            <hr/>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <form method="POST" action="/site/create">
                    <input type="text" name="username" class="form-control" placeholder="username">
                    <br/>
                    <textarea type="text" name="content" class="form-control" placeholder="content"></textarea>
                    <br/>
                    <button type="submit" class="btn btn-primary btn-lg px-4 gap-3">Add new</button>
                </form>
            </div>
        </div>
    </div>

    <div class="b-example-divider mb-0"></div>
</main>
