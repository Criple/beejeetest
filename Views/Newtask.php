<div class="col-12">
    <div class="row">
        <h1>Добавление задачи</h1>
    </div>
</div>
<form action="/home/newtaskapply" id="newTask" method="post">
    <table class="table">
        <tr>
            <th>Имя пользователя</th>
            <th>E-mail</th>
            <th>Текст задачи</th>
            <th>Статус</th>
        </tr>
        <tr>
            <td><input type="text" class="form-control" name="user_name" form="newTask" /></td>
            <td><input type="email" class="form-control" name="e_mail" form="newTask" /></td>
            <td><textarea class="form-control" name="newTaskText" form="newTask"></textarea></td>
            <td>
                <input form="newTask" type="radio" name="status" id="statusRadio1" value="1" checked /><label for="statusRadio1">Активна</label>
                <input form="newTask" type="radio" name="status" id="statusRadio2" value="0" /><label for="statusRadio2">Не активна</label>
            </td>
        </tr>
    </table>
    <div class="col-12">
        <div class="row">
            <? if(!empty($params)):?>
                <p>Заполните следующие поля:
                <? foreach ($params as $param):?>
                    <?=$param?>
                <? endforeach; ?>
                </p>
            <? endif; ?>
        </div>
    </div>
    <input type="submit" class="btn btn-primary" value="Добавить задачу"  form="newTask" />
</form>