function check_reserve_for_store(store_num) {
  setInterval(function () {
    //인터벌로 실행될 코드
    fetch(`../json_now_reservation_for_store.php?store_num=${store_num}`)
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
  if (confirm("예약 주문 들어옴")) {
    location.href = "aaa";
  }
}

check_reserve_for_store(1);
