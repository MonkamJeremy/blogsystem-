
const imageUpload = document.getElementById('profile_img');
const imageContainer = document.getElementById('profile_div');

imageUpload.addEventListener('change', function() {
  const file = imageUpload.files[0];
  const reader = new FileReader();

  reader.onload = function(event) {
    const imageData = event.target.result;
    const img = new Image();

    img.onload = function() {
      const canvas = document.createElement('canvas');
      const ctx = canvas.getContext('2d');
      canvas.width = imageContainer.offsetWidth;
      canvas.height = imageContainer.offsetHeight;
      ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

      const resizedImageData = canvas.toDataURL();
      imageContainer.style.backgroundImage = `url(${resizedImageData})`;
      imageContainer.style.backgroundSize = 'cover';
      imageContainer.style.backgroundPosition = 'center';
    };

    img.src = imageData;
  };
  reader.readAsDataURL(file);
});

