let weekButtons = document.querySelectorAll(".listing-card__info__week");

weekButtons.forEach((weekButton, index) => {
  weekButton.addEventListener("click", () => {
    console.log(weekButtons[index].classList);
    if (weekButtons[index].classList == "listing-card__info__week") {
      weekButtons[index].classList.add("active");
    } else {
      weekButtons[index].classList.remove("active");
    }
  });
});

/*
const mon = document.querySelector(".mon");

let btnValue = mon.innerHTML;
function Buttontoggle() {
  if (btnValue == "월") {
    btnValue = "";
  } else if (btnValue == "") {
    btnValue = "월";
  }
  console.log(btnValue);
}
mon.addEventListener("click", Buttontoggle);
*/
let week = document.querySelector($sel_week);
console.log(week);
