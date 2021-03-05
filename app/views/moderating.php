<div class="container" style="margin-top: 20px">
    <?php if (isset($results)) { ?>
    <div class="container">
        <div class="data_feed_back">
            <ul class="list-group">
                <?php foreach ($results as $result) { ?>
                <li class="list-group-item" style="background-color: oldlace">

                    <div class="form-moderation">
                        <form action="/admin.php" name="admin-moderation" method="post" >

                            <input type="text" style="display: none" value=" <?= $result['id'] ?>" name='id'>

                            <div class="mb-3">Запись № <?= $result['id'] ?>, от пользователя <?= $result['name'] ?>,
                                отправлена <?= $result['created_at'] ?> </div>
                            <div class="mb-3">

                                <div class="mb-3"><?= $result['email'] ?> </div>
                                <div class="mb-3">

                                <?php if(!empty($result['updated_at'])) { ?>
                                <div class="mb-3">изменен администратором
                                    <?= $result['updated_at'] ?> </div>
                                <div class="mb-3">
                                    <?php } ?>

                                    <label for="exampleInputMessage1" class="form-label">Message</label>
                                    <input type="text" class="form-control" id="exampleInputMessage1"
                                           value=" <?= $result['message'] ?>" name='message' maxlength="191" aria-describedby="messageHelp">
                                </div>
                                <div class="mb-3 form-check">
                                    <?php if($result['display'] == 1) { ?>
                                    <input type="checkbox" class="form-check-input" name="display" id="exampleCheck1" checked>
                                    <?php } elseif ($result['display'] == 0) { ?>
                                    <input type="checkbox" class="form-check-input" name="display" id="exampleCheck1" >
                                    <?php } ?>
                                    <label class="form-check-label" for="exampleCheck1">Confirmed</label>
                                </div>

                                <div class="mb-3">
                                    <img src="<?= $result['file_tmp_name'].$result['name_image'] ?>"
                                         width="100" height="100" alt="lorem" />
                                </div>

                                <div class="mt-3">
                                    <button type="submit" name="btn-moderation" value=true class="btn btn-primary">edit</button>
                                </div>
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



