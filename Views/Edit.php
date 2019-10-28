<div class="col-12">
    <h1>Редактирование задачи №<?=$params[0]['ID']?></h1>
</div>
<form action="/home/editapply" id="editTaskTextForm" method="post">
    <input type="hidden" value="<?=$params[0]['ID']?>" name="taskID" />
<table class="table">
    <tr>
        <th>ID</th>
        <th>Имя пользователя</th>
        <th>E-mail</th>
        <th>Текст задачи</th>
        <th>Статус</th>
    </tr>
    <? foreach ($params as $param){?>
        <tr>
            <td><?=$param['ID']?></td>
            <td><?=$param['user_name']?></td>
            <td><?=$param['e_mail']?></td>
            <td><textarea name="newTaskText" form="editTaskTextForm"><?=$param['task_text']?></textarea><br />
                <input type="submit" value="Сохранить" />
            </td>
            <td><?if($param['status']){echo "Активна";}else{echo "Не активна";}?></td>
        </tr>
    <? }?>
</table>
</form>