<?php if (!empty($posts)): ?>
    <?php foreach ($posts as $post): ?>
        <div id="pre">
            <p><?= $post['name_content'] ?></p>
            <p><a href="ссылка"><img height="350px" src="<?= $post['img_src_cont'] ?>"></a></p>
            <p><?= $post['discription_content'] ?></p>
            <p>Дата добавления: <?= $post['data_content'] ?>
                <a id="next2" href="ссылка">Перейти к категории</a>
                <a id="next1" href="ссылка">Читать далее</a>
            </p>
            <br/>
        </div>
    <?php endforeach; ?>
<?php endif; ?>