let divContainer2 = document.querySelector("#sub_manage_container2");
// console.log(divContainer2);
console.log(list);

for (let i = 0; i < list.length; i++) {
  let divEachSub = document.createElement("div");
  let subHTML = `
  <div><img src='${list[i].menu_photo}'></div>
  <div>${list[i].menu_nm}</div>
  <div>사용가능 회수 ${list[i].remaining_count}</div>
  <div>${list[i].pay_date}~${list[i].end_date}</div>
  <div>총 할인금액 ${list[i].save_price}</div>
  <div>상세페이지</div>
  <div>예약하기</div>
  `;
  divEachSub.innerHTML = subHTML;
  divContainer2.append(divEachSub);
}
