// Initial Ratings

// Total Stars
const starsTotal = 5;

// Run getRatings when DOM loads
document.addEventListener('DOMContentLoaded', getRatings);

// Form Elements
// const productSelect = document.getElementById('product-select');
const ratingPoint = document.querySelector('.ratingPoint').innerHTML;
const ratings = {
    star: ratingPoint,
};

// Init product
let product;

// Rating control change
ratingPoint.addEventListener('blur', (e) => {
    const rating = e.target.value;

    // Make sure 5 or under
    if (rating > 5) {
        alert('Please rate 1 - 5');
        return;
    }

    // Change rating
    ratings[product] = rating;

    getRatings();
});

// Get ratings
function getRatings() {
    for (let rating in ratings) {
        // Get percentage
        const starPercentage = (ratings[rating] / starsTotal) * 100;

        // Round to nearest 10
        const starPercentageRounded = `${
            Math.round(starPercentage / 10) * 10
        }%`;

        // Set width of stars-inner to percentage
        document.querySelector(`.${rating} .stars-inner`).style.width =
            starPercentageRounded;
    }
}
