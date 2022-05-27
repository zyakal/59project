<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/57749be668.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
    <title>59 - My address</title>
</head>
<body>
    <div class="container">
        <header>
            <?php
            $page_name = "구독 주소 설정";
            include_once "header.php";
            ?>
        </header>
        <main class="my_addr--main">
            <form action="my_addr_proc.php" method="post">
                <div class="my_addr--form--input">
                    <div class="input--top">
                        <i class='fa-solid fa-magnifying-glass'></i>
                        <input type="text" id="my_address" name="my_addr" placeholder="건물명, 도로명 또는 지번으로 검색">
                    </div>
                </div>
                <div class="my_addr--form--button">
                    <input class="my_addr--button" type="submit" value="주소 설정">
                </div>
            </form>
            <div id="my_address">
                <div>현재 위치로 주소설정 원하는 경우</div>
                <div>아래의 버튼을 누르고 위치 정보에 동의 해주세요</div>
                <button class="my_addr--button" onclick="getLocation()">현재 위치로 주소설정</button>
                <p id="demo"></p>
            </div>
        </main>
        <footer>
            <?php
            include_once "footer.html";
            ?>
        </footer>
    </div>
    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=7bfb673c0f6bf2c1ea0c0bdce834d211&libraries=services"></script>
    <script>
        var x = document.getElementById("demo");

        function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(getAddr);
        } else { 
            x.innerHTML = "현재 위치가 확인 되지 않습니다.";
        }
        }

        // var geocoder = new kakao.maps.services.Geocoder();

        
        // function  getCoordinate(address) {
        // // x.innerHTML = "Latitude: " + position.coords.latitude + 
        // // "<br>Longitude: " + position.coords.longitude;
        // let result = "";

        // const header = `Authorization: KakaoAk ${rest_api_key}`;

        // let r = requests.get(url, headers=header);
        //     if (r.status_code == 200) {
        //         if (len(r.json()['documents']) != 0) {
        //             result_address = r.json()["documents"][0]["address"];
        //             result = (result_address["y"],result_address["x"]);
        //         }
        //         return result;
        //     }
        // }
        
        // console.log(getCoordinate("대구 중구 동성로 1"));

        function getAddr(address){
            var lat = coords.latitude; // 위도
            var lng = coords.longitude; // 경도
            let geocoder = new kakao.maps.services.Geocoder();

            let coord = new kakao.maps.LatLng(lat, lng);
            let callback = function(result, status) {
                if (status === kakao.maps.services.Status.OK) {
                    console.log(result);
                }
            };

            geocoder.coord2Address(coord.getLng(), coord.getLat(), callback);
        }
        
    </script>

</body>
<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script>
window.onload = function(){
    document.getElementById("my_address").addEventListener("click", function(){ //주소입력칸을 클릭하면
        //카카오 지도 발생
        new daum.Postcode({
            oncomplete: function(data) { //선택시 입력값 세팅
                document.getElementById("my_address").value = data.address; // 주소 넣기
            }
        }).open();
    });
}
</script>
</html>