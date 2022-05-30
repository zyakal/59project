<?php
    $my_address = $_POST['my_addr']; 
?>
<script>
    let pre = localStorage.getItem('my_addr');
    let now = '<?=$my_address?>';
    if(pre !== now) {
        localStorage.clear();
        localStorage.setItem('my_addr', `${now}`);
    } 
    else {
        localStorage.setItem('my_addr', `${now}`);
    }
    location.href = 'home.php';
</script>
