<div class="container">
    <div>

    </div>
</div>


<div class="container mt-4">
    <h3>Form</h3>
    <?php if(isset($res) && !empty($res)) { ?>
        <?= $res; ?>
    <?php } ?>
    <?php if (!empty($err)) { ?>
        <?php foreach ($err as $item) { ?>
            <p><?= $item; ?></p>
        <?php } ?>
    <?php } ?>
    <form action="index.php" method="POST" enctype="multipart/form-data">


        <div class="mb-3">
            <label for="exampleInputImage1" class="form-label">Image</label>
            <input class="form-control" type='file' name='image' aria-describedby="imageHelp">
            <div id="imageHelp" class="form-text">Загрузите картинку</div>
        </div>

        <div class="mb-3">
            <label for="exampleInputName1" class="form-label">Name</label>
            <input type="text" class="form-control" id="exampleInputName1" name='name' aria-describedby="nameHelp">
            <div id="nameHelp" class="form-text">Введите имя</div>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name='email' aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">Введите Email</div>
        </div>

        <div class="mb-3">
            <label for="exampleInputMessage1" class="form-label">Message</label>
            <input type="text" class="form-control" id="exampleInputMessage1" name='message' aria-describedby="messageHelp">
            <div id="messageHelp" class="form-text">Введите сообщение</div>
        </div>

        <div>
            <input type="submit" name="btn_submit" class="btn btn-primary" value="Отправить">
        </div>

        <div class="mt-1">
            <input type="submit" name="btn_submit" class="btn btn-primary" value="Пред просмотр">
        </div>

    </form>
</div>



