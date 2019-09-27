const navSlide = () => {
  const burger = document.querySelector('.burger');
  const nav = document.querySelector('#sidebar');
  const navLinks = document.querySelectorAll('#sidebar li');

  burger.addEventListener('click', () => {
      //Toggle Nav
      document.getElementById('sidebar').classList.toggle('active');

       //Burger animation
       burger.classList.toggle('toggle');

   });
}

navSlide();
