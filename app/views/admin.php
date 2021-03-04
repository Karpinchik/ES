<div class="container" style="margin-top: 20px">
    <?php if (isset($results)) { ?>
    <div class="container">
        <div class="data_feed_back">
            <ul class="list-group">
                <?php foreach ($results as $result) { ?>
                <li class="list-group-item" style="background-color: oldlace">

                    <div class="form-moderation">
                        <form action="/admin" method="post" >



                            <input type="text" style="display: none" value=" <?= $result['id'] ?>" name='id'>

                            <div class="mb-3">Запись № <?= $result['id'] ?>, от пользователя <?= $result['name'] ?>,
                                отправлен <?= $result['created_at'] ?> </div>
                            <div class="mb-3">

                                <?php if(!empty($result['redactor'])) { ?>
                                <div class="mb-3">Последний раз запись редактоировалась администратором <?= $result['redactor'] ?>,
                                    <?= $result['updated_at'] ?> </div>
                                <div class="mb-3">
                                    <?php } ?>

                                    <label for="exampleInputMessage1" class="form-label">Message</label>
                                    <input type="text" class="form-control" id="exampleInputMessage1"
                                           value=" <?= $result['message'] ?>" name='message' aria-describedby="messageHelp">
                                </div>
                                <div class="mb-3 form-check">
                                    <?php if($result->confirmed == 1) { ?>
                                    <input type="checkbox" class="form-check-input" name="confirmed" id="exampleCheck1" checked>
                                    <?php } elseif ($result->confirmed == 0) { ?>
                                    <input type="checkbox" class="form-check-input" name="confirmed" id="exampleCheck1" >
                                    <?php } ?>
                                    <label class="form-check-label" for="exampleCheck1">Confirmed</label>
                                </div>

                                <div class="mb-3">
                                    <img src="<?= $result['file_tmp_name'].$result['name_image'] ?>"/>
                                </div>

                                <button type="submit" name="btn_redaction" class="btn btn-primary">edit</button>
                                <button type="submit" name="btn_delete" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </li>
                <hr>
                <?php } ?>
            </ul>
        </div>
    </div>
    <?php } ?>





</div>



