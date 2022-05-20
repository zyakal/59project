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
// if (weekButtons[index].classList == "listing-card__info__week active") {
//   weekButtons[index].classList.remove("active");
// }
