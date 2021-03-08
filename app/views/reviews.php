<div class="container text-center mt-4">
<h3>Active reviews and form</h3>
</div>


<div class="container">
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            sort
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="/index.php?sort_date=created_at">date</a>
            <a class="dropdown-item" href="/index.php?sort_date=email">email</a>
            <a class="dropdown-item" href="/index.php?sort_date=name">name</a>
        </div>
    </div>
</div>


<div class="container mt-2">
    <?php if (isset($results) && !empty($results)) { ?>
        <div class="container">
            <div class="data_feed_back">

                <ul class="list-group">
                    <?php foreach ($results as $result) { ?>
                        <li class="list-group-item" style="background-color: oldlace">
                            <div class="rewiews_list">
                                <div class="mb-3">Запись № <b><?= $result['id'] ?></b>, от пользователя <b><?= $result['name'] ?></b>,
                                    добавлена <b><?= $result['created_at'] ?></b>
                                </div>

                                <div class="review_item mb-3" id="<?= $result['id'] ?>">
                                    <?php if(!empty($result['redactor'])) { ?>
                                        <div class="mb-3">Последний раз запись редактоировалась администратором <?= $result['redactor'] ?>,
                                            <?= $result['updated_at'] ?>
                                        </div>
                                    <?php } ?>

                                    <?php if(!empty($result['message'])) { ?>
                                        <div class="mb-3">
                                            <?= $result['message'] ?>
                                        </div>
                                    <?php } ?>

                                    <div class="mb-3">
                                        <img src="<?= $result['file_tmp_name'].$result['name_image'] ?>"/>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <hr>
                    <?php } ?>
                </ul>
            </div>
        </div>
    <?php } ?>
</div>
