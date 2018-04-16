<table id="mainTable" class="table-striped" style="overflow:hidden; display: list-item;">
    <thead>
    <tr>
        <th>Удалить</th>
        <th>Опорный вопрос</th>
        <th>Ответ</th>
        <th>Действие</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($result as $key => $value):
        ?>
        <tr id="<?php echo $value['id'];?>" >
            <td id="del_btn" ><button class="del_btn btn btn-success waves-effect" id="<?php echo $value['id'];?>">удалить</button></td>
            <td id="<?php echo $value['id'];?>" name="question"><?php echo $value['question'];?></td>
            <td id="<?php echo $value['id'];?>" name="answer"><?php echo $value['answer'];?></td>
            <td id="<?php echo $value['id'];?>" name="answer_details"><?php echo $value['answer_details'];?></td>
        </tr>
    <?php
        // if(!$value['question'] AND !$value['answer'] AND !$value['answer_details']) break;
    endforeach
    ?>

    </tbody>
    <tfoot>
    <tr>
        <th>Удалить</th>
        <th>Опорный вопрос</th>
        <th>Ответ</th>
        <th>Действие</th>
    </tr>
    </tfoot>
</table>