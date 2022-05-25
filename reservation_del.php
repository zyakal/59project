<?php
$page_name = "";
$store_num = $_POST['store_num'];
$menu_num = $_POST['menu_num'];
$sub_num = $_POST['sub_num'];
$remaining_count = $_POST['remaining_count'];


$openTime = "09:00";
$closeTime = "19:00";
$openDay = "월 화 수 목 금 토 일";
// 영업시간 초기값
// 휴무일반영되게 추가해야함.


$param = [
  "store_num" => $store_num,
  "menu_num" => $menu_num,
  "sub_num" => $sub_num
];
include_once 'db/db_store_and_menu.php';
$list_store = select_one_store($param);
$sales_time = str_replace(" ", "", $list_store['sales_time']);
if (isset($list_store)) {
  $openTime = explode(",", $sales_time)[0];
  $closeTime = explode(",", $sales_time)[1];
}
$list_menu = select_one_menu($param);
if (isset($list_menu)) {
  $menu_nm = $list_menu['menu_nm'];
  $menu_subed_count = $list_menu['subed_count'];
}
// print_r($list_menu);
// echo "<br>";
// print_r($list_store);
// echo "<br>".$list_store['sales_time'];
// echo "<br>";
// echo "open:".$openTime."<br>";
// echo "close:".$closeTime;
?>

<script>
  let requiredTimeMin = <?= $list_menu['required_time'] ?>;
  console.log("requiredTime:" + requiredTimeMin);
</script>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/57749be668.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <link rel="stylesheet" href="css/screens/reservation.css" />
  <link rel="stylesheet" href="css/styles_std.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

  <title>reservation</title>
</head>

<body>
  <div class="container">
    <header>
      <?php
      include_once "header.php";
      ?>
    </header>
    <main class="reservation">
      <div class="reservation__do-reserve">
        <h1>예약하기</h1>
        <table>
          <tr>
            <td>구독메뉴</td>
            <td><?= $menu_nm ?></td>
          </tr>
          <tr>
            <td>남은횟수</td>
            <td><?= $remaining_count ?>회</td>
          </tr>
        </table>
      </div>
      <form action="reservation_proc.php" method="post">
        <div class="reservation__select-day">
          <div>날짜선택</div>
          <div class="day-box">
            <div class="swiper mySwiper1">
              <div class="swiper-wrapper"></div>
            </div>
          </div>
        </div>

        <div class="reservation__select-time">
          <div>시간선택</div>
          <div class="time-box">
            <div class="swiper mySwiper2">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <h4>Scroll Container</h4>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In luctus,
                    ex eu sagittis faucibus, ligula ipsum sagittis magna, et imperdiet
                    dolor lectus eu libero. Vestibulum venenatis eget turpis sed
                    faucibus. Maecenas in ullamcorper orci, eu ullamcorper sem. Etiam
                    elit ante, luctus non ante sit amet, sodales vulputate odio. Aenean
                    tristique nisl tellus, sit amet fringilla nisl volutpat cursus.
                    Quisque dignissim lectus ac nunc consectetur mattis. Proin vel
                    hendrerit ipsum, et lobortis dolor. Vestibulum convallis, nibh et
                    tincidunt tristique, nisl risus facilisis lectus, ut interdum orci
                    nisl ac nunc. Cras et aliquam felis. Quisque vel ipsum at elit
                    sodales posuere eget non est. Fusce convallis vestibulum dolor non
                    volutpat. Vivamus vestibulum quam ut ultricies pretium.
                  </p>
                  <p>
                    Suspendisse rhoncus fringilla nisl. Mauris eget lorem ac urna
                    consectetur convallis non vel mi. Donec libero dolor, volutpat ut
                    urna sit amet, aliquet molestie purus. Phasellus faucibus, leo vel
                    scelerisque lobortis, ipsum leo sollicitudin metus, eget sagittis
                    ante orci eu ipsum. Nulla ac mauris eu risus sagittis scelerisque
                    iaculis bibendum mauris. Cras ut egestas orci. Cras odio risus,
                    sagittis ut nunc vitae, aliquam consectetur purus. Vivamus ornare
                    nunc vel tellus facilisis, quis dictum elit tincidunt. Donec
                    accumsan nisi at laoreet sodales. Cras at ullamcorper massa.
                    Maecenas at facilisis ex. Nam mollis dignissim purus id efficitur.
                  </p>
                  <p>
                    Curabitur eget aliquam erat. Curabitur a neque vitae purus volutpat
                    elementum. Vivamus quis vestibulum leo, efficitur ullamcorper velit.
                    Integer tincidunt finibus metus vel porta. Mauris sed mauris congue,
                    pretium est nec, malesuada purus. Nulla hendrerit consectetur arcu
                    et lacinia. Suspendisse augue justo, convallis eget arcu in, pretium
                    tempor ligula. Nullam vulputate tincidunt est ut ullamcorper.
                  </p>
                  <p>
                    Curabitur sed sodales leo. Nulla facilisi. Etiam condimentum, nisi
                    id tempor vulputate, nisi justo cursus justo, pellentesque
                    condimentum diam arcu sit amet leo. Cum sociis natoque penatibus et
                    magnis dis parturient montes, nascetur ridiculus mus. In placerat
                    tellus a posuere vehicula. Donec diam massa, efficitur vitae mattis
                    et, pretium in augue. Fusce iaculis mi quis ante venenatis, sit amet
                    pellentesque orci aliquam. Vestibulum elementum posuere vehicula.
                  </p>
                  <p>
                    Sed tincidunt diam a massa pharetra faucibus. Praesent condimentum
                    id arcu nec fringilla. Maecenas faucibus, ante et venenatis
                    interdum, erat mi eleifend dui, at convallis nisl est nec arcu. Duis
                    vitae arcu rhoncus, faucibus magna ut, tempus metus. Cras in nibh
                    sed ipsum consequat rhoncus. Proin fringilla nulla ut augue tempor
                    fermentum. Nunc hendrerit non nisi vitae finibus. Donec eget ornare
                    libero. Aliquam auctor erat enim, a semper risus semper at. In ut
                    dui in metus tincidunt euismod eget et lacus. Aenean et dictum urna,
                    sed rhoncus lorem. Duis pharetra sagittis odio. Etiam a libero ut
                    nisi feugiat tincidunt vel vitae turpis. Maecenas vel orci sit amet
                    lorem hendrerit venenatis sollicitudin ut dui. Quisque rhoncus nibh
                    in massa pretium scelerisque.
                  </p>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In luctus,
                    ex eu sagittis faucibus, ligula ipsum sagittis magna, et imperdiet
                    dolor lectus eu libero. Vestibulum venenatis eget turpis sed
                    faucibus. Maecenas in ullamcorper orci, eu ullamcorper sem. Etiam
                    elit ante, luctus non ante sit amet, sodales vulputate odio. Aenean
                    tristique nisl tellus, sit amet fringilla nisl volutpat cursus.
                    Quisque dignissim lectus ac nunc consectetur mattis. Proin vel
                    hendrerit ipsum, et lobortis dolor. Vestibulum convallis, nibh et
                    tincidunt tristique, nisl risus facilisis lectus, ut interdum orci
                    nisl ac nunc. Cras et aliquam felis. Quisque vel ipsum at elit
                    sodales posuere eget non est. Fusce convallis vestibulum dolor non
                    volutpat. Vivamus vestibulum quam ut ultricies pretium.
                  </p>
                  <p>
                    Suspendisse rhoncus fringilla nisl. Mauris eget lorem ac urna
                    consectetur convallis non vel mi. Donec libero dolor, volutpat ut
                    urna sit amet, aliquet molestie purus. Phasellus faucibus, leo vel
                    scelerisque lobortis, ipsum leo sollicitudin metus, eget sagittis
                    ante orci eu ipsum. Nulla ac mauris eu risus sagittis scelerisque
                    iaculis bibendum mauris. Cras ut egestas orci. Cras odio risus,
                    sagittis ut nunc vitae, aliquam consectetur purus. Vivamus ornare
                    nunc vel tellus facilisis, quis dictum elit tincidunt. Donec
                    accumsan nisi at laoreet sodales. Cras at ullamcorper massa.
                    Maecenas at facilisis ex. Nam mollis dignissim purus id efficitur.
                  </p>
                  <p>
                    Curabitur eget aliquam erat. Curabitur a neque vitae purus volutpat
                    elementum. Vivamus quis vestibulum leo, efficitur ullamcorper velit.
                    Integer tincidunt finibus metus vel porta. Mauris sed mauris congue,
                    pretium est nec, malesuada purus. Nulla hendrerit consectetur arcu
                    et lacinia. Suspendisse augue justo, convallis eget arcu in, pretium
                    tempor ligula. Nullam vulputate tincidunt est ut ullamcorper.
                  </p>
                  <p>
                    Curabitur sed sodales leo. Nulla facilisi. Etiam condimentum, nisi
                    id tempor vulputate, nisi justo cursus justo, pellentesque
                    condimentum diam arcu sit amet leo. Cum sociis natoque penatibus et
                    magnis dis parturient montes, nascetur ridiculus mus. In placerat
                    tellus a posuere vehicula. Donec diam massa, efficitur vitae mattis
                    et, pretium in augue. Fusce iaculis mi quis ante venenatis, sit amet
                    pellentesque orci aliquam. Vestibulum elementum posuere vehicula.
                  </p>
                  <p>
                    Sed tincidunt diam a massa pharetra faucibus. Praesent condimentum
                    id arcu nec fringilla. Maecenas faucibus, ante et venenatis
                    interdum, erat mi eleifend dui, at convallis nisl est nec arcu. Duis
                    vitae arcu rhoncus, faucibus magna ut, tempus metus. Cras in nibh
                    sed ipsum consequat rhoncus. Proin fringilla nulla ut augue tempor
                    fermentum. Nunc hendrerit non nisi vitae finibus. Donec eget ornare
                    libero. Aliquam auctor erat enim, a semper risus semper at. In ut
                    dui in metus tincidunt euismod eget et lacus. Aenean et dictum urna,
                    sed rhoncus lorem. Duis pharetra sagittis odio. Etiam a libero ut
                    nisi feugiat tincidunt vel vitae turpis. Maecenas vel orci sit amet
                    lorem hendrerit venenatis sollicitudin ut dui. Quisque rhoncus nibh
                    in massa pretium scelerisque.
                  </p>
                </div>
              </div>
              <div class="swiper-scrollbar"></div>
            </div>
          </div>
        </div>


        <input type="hidden" name="sub_num" value="<?= $sub_num ?>">
        <input type="hidden" name="remaining_count" value="<?= $remaining_count ?>">
        <input type="submit" />
      </form>
      <script>
        <?= "let openTime = '$openTime';" ?>
        <?= "let closeTime = '$closeTime';" ?>
        <?= "let openDay = '$openDay';" ?>

        var swiper = new Swiper(".mySwiper1", {
          slidesPerView: 6.5,
          spaceBetween: 15,
          pagination: {
            // el: ".swiper-pagination",
            clickable: false,
          },
        });

        var swiper = new Swiper(".mySwiper2", {
          direction: "vertical",
          slidesPerView: "auto",
          freeMode: true,
          scrollbar: {
            el: ".swiper-scrollbar",
          },
          mousewheel: true,
        });
      </script>
      <script src="./js/reservation_create_time_fn.js"></script>
    </main>
    <footer>
      <?php
      include_once "footer.html";
      ?>
    </footer>
  </div>
</body>

</html>