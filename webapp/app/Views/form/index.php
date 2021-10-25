<div>
    <h2>form</h2>
</div>
<div>
    <form action="/form" method="POST">
        <?= csrf_field() ?>
        <input type="text" name="value" id="">
        <input type="submit" value="submit">
    </form>
</div>
