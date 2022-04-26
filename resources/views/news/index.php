<h1><?=$title;?></h1>

<nav>
    <a href="<?=route('category');?>">&laquo; Назад</a>
</nav>

<?php if($items): ?>

    <?php foreach($items as $news): ?>

        <article>
            <p><small><?=$news['created_at'];?></small></p>
            <h2><?=$news['title'];?></h2>
            <p><?=$news['preview'];?></p>
            <p><b>Источник:</b> <?=$news['source'];?></p>
            <p>
                <a href="<?=route('news.show', $news['id']);?>"><em>Подробнее</em></a>
            </p>
            <hr>
        </article>

    <?php endforeach; ?>

<?php else: ?>

    <p>По вашему запросу ничего не найдено</p>

<?php endif; ?>
