<div class="container" style="margin-top: 20px">
    <?php if (isset($results)) { ?>
        <div class="container">
            <div class="data_feed_back">

                <ul class="list-group">
                    <?php foreach ($results as $result) { ?>
                        <li class="list-group-item" style="background-color: oldlace">
                            <div class="rewiews_list">
                                <div class="mb-3">Запись № <?= $result['id'] ?>, от пользователя <?= $result['name'] ?>,
                                    отправлен <?= $result['created_at'] ?>
                                </div>
                                <div class="mb-3">
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
