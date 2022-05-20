function check_reserve_for_store(store_num) {
  setInterval(function () {
    //인터벌로 실행될 코드
    fetch(`../now_reservation_for_store_json.php?store_num=${store_num}`)
      .then((response) => {
        return response.json();
      })
      .then((nowRes) => {
        console.log(nowRes.length);
        if (nowRes.length > 0) {
          whenNewReservation(nowRes);
        }
      });
  }, 5000);
}

function whenNewReservation(nowRes) {
  console.log(nowRes);
  if (confirm("예약 요청이 들어왔습니다")) {
    location.href = "now_reservation_for_store_proc.php";
  }
}

// check_reserve_for_store(1);
// 이 파일을 import하고 ()안에 store_num 넣어서 함수호출하면 알림기능 켜지는것.
