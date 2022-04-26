<h1><?=$title;?></h1>

<?php if($items): ?>
    <ul>
        <?php foreach($items as $id => $category): ?>
            <li>
                <a href="<?=route('category.news', $id);?>"><?=$category;?></a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
