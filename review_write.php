<!-- 오구프로젝트 
시작일시 : 2022.05.13일
버전 : 오구 1.0v
-->
<?php
include_once 'db/db_store.php';

$page_name = '리뷰페이지';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://kit.fontawesome.com/8eb4f0837a.js" crossorigin="anonymous" defer></script>
  <link rel="stylesheet" href="css/styles.css">
  <style>
    #full-stars-example .rating-group {
      display: inline-flex;
    }

    #full-stars-example .rating__icon {
      pointer-events: none;
    }

    #full-stars-example .rating__input {
      position: absolute !important;
      left: -9999px !important;
    }

    #full-stars-example .rating__label {
      cursor: pointer;
      padding: 0 0.1em;
      font-size: 2rem;
    }

    #full-stars-example .rating__icon--star {
      color: orange;
    }

    #full-stars-example .rating__icon--none {
      color: #eee;
    }

    #full-stars-example .rating__input--none:checked+.rating__label .rating__icon--none {
      color: red;
    }

    #full-stars-example .rating__input:checked~.rating__label .rating__icon--star {
      color: #ddd;
    }

    #full-stars-example .rating-group:hover .rating__label .rating__icon--star {
      color: orange;
    }

    #full-stars-example .rating__input:hover~.rating__label .rating__icon--star {
      color: #ddd;
    }

    #full-stars-example .rating-group:hover .rating__input--none:not(:hover)+.rating__label .rating__icon--none {
      color: #eee;
    }

    #full-stars-example .rating__input--none:hover+.rating__label .rating__icon--none {
      color: red;
    }

    #half-stars-example .rating-group {
      display: inline-flex;
    }

    #half-stars-example .rating__icon {
      pointer-events: none;
    }

    #half-stars-example .rating__input {
      position: absolute !important;
      left: -9999px !important;
    }

    #half-stars-example .rating__label {
      cursor: pointer;
      padding: 0 0.1em;
      font-size: 2rem;
    }

    #half-stars-example .rating__label--half {
      padding-right: 0;
      margin-right: -0.6em;
      z-index: 2;
    }

    #half-stars-example .rating__icon--star {
      color: orange;
    }

    #half-stars-example .rating__icon--none {
      color: #eee;
    }

    #half-stars-example .rating__input--none:checked+.rating__label .rating__icon--none {
      color: red;
    }

    #half-stars-example .rating__input:checked~.rating__label .rating__icon--star {
      color: #ddd;
    }

    #half-stars-example .rating-group:hover .rating__label .rating__icon--star,
    #half-stars-example .rating-group:hover .rating__label--half .rating__icon--star {
      color: orange;
    }

    #half-stars-example .rating__input:hover~.rating__label .rating__icon--star,
    #half-stars-example .rating__input:hover~.rating__label--half .rating__icon--star {
      color: #ddd;
    }

    #half-stars-example .rating-group:hover .rating__input--none:not(:hover)+.rating__label .rating__icon--none {
      color: #eee;
    }

    #half-stars-example .rating__input--none:hover+.rating__label .rating__icon--none {
      color: red;
    }

    #full-stars-example-two .rating-group {
      display: inline-flex;
    }

    #full-stars-example-two .rating__icon {
      pointer-events: none;
    }

    #full-stars-example-two .rating__input {
      position: absolute !important;
      left: -9999px !important;
    }

    #full-stars-example-two .rating__input--none {
      display: none;
    }

    #full-stars-example-two .rating__label {
      cursor: pointer;
      padding: 0 0.1em;
      font-size: 2rem;
    }

    #full-stars-example-two .rating__icon--star {
      color: orange;
    }

    #full-stars-example-two .rating__input:checked~.rating__label .rating__icon--star {
      color: #ddd;
    }

    #full-stars-example-two .rating-group:hover .rating__label .rating__icon--star {
      color: orange;
    }

    #full-stars-example-two .rating__input:hover~.rating__label .rating__icon--star {
      color: #ddd;
    }
  </style>
</head>

<body>
  <!-- 전체사이즈 -->
  <div class="container">
    <!-- header 인클루드해서 사용 -->
    <header>
      <?php
      include_once "header.php";
      ?>
    </header>
    <!-- main -->
    <main>
      <div class="main--box">
        <div class="review--title">
          <h1 class="store--name">
            가게이름
          </h1>
        </div>
        <div class="review--content">
          <form action="" method="post">
            <div id="full-stars-example-two">
              <div class="rating-group">
                <input disabled checked class="rating__input rating__input--none" name="rating3" id="rating3-none" value="0" type="radio">
                <label aria-label="1 star" class="rating__label" for="rating3-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                <input class="rating__input" name="rating3" id="rating3-1" value="1" type="radio">
                <label aria-label="2 stars" class="rating__label" for="rating3-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                <input class="rating__input" name="rating3" id="rating3-2" value="2" type="radio">
                <label aria-label="3 stars" class="rating__label" for="rating3-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                <input class="rating__input" name="rating3" id="rating3-3" value="3" type="radio">
                <label aria-label="4 stars" class="rating__label" for="rating3-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                <input class="rating__input" name="rating3" id="rating3-4" value="4" type="radio">
                <label aria-label="5 stars" class="rating__label" for="rating3-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                <input class="rating__input" name="rating3" id="rating3-5" value="5" type="radio">
              </div>
              <p class="desc" style="font-family: sans-serif; font-size:0.9rem">Full stars<br />
                Must select a star value</p>
            </div>
          </form>
        </div>
      </div>
    </main>
  </div>
</body>

</html>