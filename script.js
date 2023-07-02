document.addEventListener('DOMContentLoaded', function() {
    const frameImage = document.querySelector('.frame-image');
    const images = [
      'pic1.gif',
      '',
      'https://i.pinimg.com/736x/3a/c1/6b/3ac16b1537c86b632d8a39c07bc31703.jpg',
      'https://i.pinimg.com/originals/1d/b2/4f/1db24f33678d34d78d775e17681094b3.jpg',
      'image9.jpg',
      'image10.jpg'
    ];
    let currentIndex = 0;
  
    function changeImage() {
      frameImage.style.opacity = 0;
      setTimeout(function() {
        currentIndex = (currentIndex + 1) % images.length;
        frameImage.src = images[currentIndex];
        frameImage.style.opacity = 1;
      }, 500);
    }
  
    setInterval(changeImage, 4000);
  });
  