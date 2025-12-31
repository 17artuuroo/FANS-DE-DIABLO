const hamburger = document.getElementById('hamburger');
const menu = document.getElementById('menu');

hamburger.addEventListener('click', () => {
  menu.classList.toggle('active');
});

document.addEventListener('click', (event) => {
  if (!menu.contains(event.target) && !hamburger.contains(event.target)) {
    menu.classList.remove('active');
  }
});