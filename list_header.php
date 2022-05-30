<nav class="header--nav">
    <div class="nav--logo">
        <a href="javascript:history.back();" class="nav--back">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
    </div>
    <div class="nav--addr">
        <a href="my_addr.php">
            <i class="fa-solid fa-location-dot"></i>
            <script>
                if(localStorage.getItem('my_addr') !== null) {
                    document.write(localStorage.getItem('my_addr'));
                } else {
                    document.write('현재 위치 없음');
                }
            </script>
            <i class="fa-solid fa-angle-down"></i>
        </a>
    </div>
    <div class="nav--notice">
        <a href="not.php">
            <i class="fa-regular fa-bell"></i>
        </a>
    </div>
</nav>