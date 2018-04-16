<h2 class="card-inside-title">Вопросы заданные франчами</h2>
<div class="demo-checkbox" style="display: grid;">
    <?php foreach ($result as $key => $value) :?>
        <input type="checkbox" class="ches" id="<?php echo $value['id'] ?>" name="<?php echo $value['chat_id'] ?>" value="<?php echo $value['id'] ?>" title="<?php echo $value['question'] ?>">
        <label for="<?php echo $value['id'] ?>"><?php echo $value['question'] ?></label>
    <?php endforeach ?>
        <button class="take_answer btn btn-success waves-effect">ответить</button>
</div>