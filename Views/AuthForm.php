<div class="col-12">
    <div class="row">
        <form action="/authorization" method="post">
            <div class="form-group">
                <label>
                    Login:
                </label>
                <input type="text" class="form-control" name="login" />
            </div>
            <div class="form-group">
                <label>
                    Password:
                </label>
                <input type="text" class="form-control" name="password" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Войти" />
            </div>
        </form>
        <div class="col-12">
            <div class="row">

                <? if(!empty($params['auth_err'])):?>
                    <span>Найдены следующие ошибки: </span>
                    <? foreach ($params['auth_err'] as $param):?>
                        <?=$param;?>
                    <? endforeach; ?>
                <? endif; ?>
            </div>
        </div>
    </div>
</div>