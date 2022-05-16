var num = 24.375;
document.querySelector('.button2').addEventListener('click', function() {
    document.querySelector('.slide_list').style.transform = `translate(-${num}rem)`;
})
document.querySelector('.button3').addEventListener('click', function() {
    document.querySelector('.slide_list').style.transform = `translate(-${num*2}rem)`;
})
document.querySelector('.button4').addEventListener('click', function() {
    document.querySelector('.slide_list').style.transform = `translate(-${num*3}rem)`;
})
document.querySelector('.button5').addEventListener('click', function() {
    document.querySelector('.slide_list').style.transform = `translate(-${num*4}rem)`;
})
   

