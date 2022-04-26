<?php if($news): ?>

    <nav>
        <a href="<?=route('category.news', $news['category_id']);?>">&laquo; Назад</a>
    </nav>

    <h1><?=$news['title'];?></h1>

    <p><small><?=$news['created_at'];?></small></p>
    <p><?=$news['preview'];?></p>
    <p><b>Источник:</b> <?=$news['source'];?></p>

<?php else: ?>

    <p>По вашему запросу ничего не найдено</p>

<?php endif; ?>
