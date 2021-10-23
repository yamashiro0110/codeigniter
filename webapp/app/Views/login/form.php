<div>
    <form action="/login" method="POST">
        <?= csrf_field() ?>
        <p>ID:<input type="text" name="id" id=""></p>
        <p>PW:<input type="password" name="password" id=""></p>
        <p><input type="submit" value="login"></p>
    </form>
</div>
