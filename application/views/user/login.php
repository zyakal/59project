<div>
    <form action="loginProc" method="post">
        <div><label><input type="text" name="uid" placeholder="아이디"></label></div>
        <div><label><input type="password" name="upw" placeholder="비밀번호"></label></div>       
        <div>
            <input type="submit" value="로그인">
        </div>
    </form>
    <?=$_GET['url'];?>
    <?=rtrim($_GET['url'], '/');?>
    <?=filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL);?>
    <?=substr('abcdefg', 2);?>
    <?php print_r(explode('/', $_GET['url']));?>
</div>