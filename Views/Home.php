<div class="d-flex flex-row justify-content-start sortCont">
    <span class="align-self-center">Сортировать по </span>
    <form id="sortForm" action="/" method="get" class="d-flex flex-row justify-content-start">
        <div class="form-group">
            <select name="sortField" class="form-control">
                <option value="user_name" selected>Имени</option>
                <option value="e_mail">E-mail</option>
                <option value="status">Статусу</option>
            </select>
        </div>
        <div class="form-group">
            <select name="sortDirection" class="form-control">
                <option value="asc" selected>По возрастанию</option>
                <option value="desc">По убыванию</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" value="Применить"  class="btn btn-primary" />
        </div>
    </form>

</div>
<div class="col-12">
    <div class="row">
        <? if($_SESSION['createdTask']): ?>
            <span>Задача успешно создана!</span>
        <? unset($_SESSION['createdTask']); endif; ?>
    </div>
</div>
<table class="table">
    <tr>
        <th>ID</th>
        <th>Имя пользователя</th>
        <th>E-mail</th>
        <th>Текст задачи</th>
        <th>Статус</th>
        <th></th>
    </tr>
    <? foreach ($params['Tasks'] as $param):?>
        <tr>
            <td><?=$param['ID']?></td>
            <td><?=$param['user_name']?></td>
            <td><?=$param['e_mail']?></td>
            <td><?=$param['task_text']?>
                <? if ($this->isAuth()):?>
                    <br /><a href="/home/edit?task_id=<?=$param['ID']?>">Редактировать</a>
                <? endif; ?>
            </td>
            <td>
                <? if ($this->isAuth()):?>
                    <input type="checkbox" id="statusChangeCheck<?=$param['ID']?>" value="<?=$param['ID']?>" class="form-check-input statusCheck" />
                <? endif; ?>
                <?if($param['status']){echo '<label for="statusChangeCheck' . $param['ID'] . '" class="activity">Активна</label>';}else{echo '<label for="statusChangeCheck' . $param['ID'] . '" class="activity">Не активна</label>';}?>
            </td>
            <td><?=($param['isAdminEdited'] ? 'Отредактировано администратором' : '')?></td>
        </tr>
    <? endforeach; ?>
</table>
<div class="col-12">
    <div class="row">
        <a href="/home/newtask">Новая задача</a><br />
    </div>
</div>

<form action="/" method="post" id="paginationForm">
    <input type="hidden" value="" name="page" />
</form>
<?
for ($i = 1; $i <= $params['str_pag']; $i++){
    echo '<a href="#" class="paginationLinks" data-page="'. $i . '">Страница '.$i.' </a>';
}
?>