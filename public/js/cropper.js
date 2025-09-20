import Cropper from 'cropperjs';
  
  let cropper;
  const fileInput = document.getElementById('image_path');
  const previewCanvas = document.getElementById('preview');
  const croppedInput = document.getElementById('cropped_image');
  const cropBtn = document.getElementById('crop');

  // 1. Ketika pilih gambar
  fileInput.addEventListener('change', (event) => {
    const file = event.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = (e) => {
      // Buat img element baru untuk cropper
      let img = document.createElement('img');
      img.id = 'image';
      img.src = e.target.result;
      img.style.maxWidth = '100%';

      // Hapus cropper lama kalau ada
      const oldImage = document.getElementById('image');
      if (oldImage) oldImage.remove();

      fileInput.insertAdjacentElement('afterend', img);

      if (cropper) cropper.destroy();
      cropper = new Cropper(img, {
        aspectRatio: 1,     // 🔄 sesuaikan (1:1, 16:9, dll)
        viewMode: 1,
        autoCropArea: 0.8,
      });
    };
    reader.readAsDataURL(file);
  });

  // 2. Tombol crop
  cropBtn.addEventListener('click', () => {
    if (!cropper) return;

    const canvas = cropper.getCroppedCanvas({
      width: 600,   // 🔄 atur ukuran hasil
      height: 600
    });

    // tampilkan hasil di <canvas id="preview">
    const ctx = previewCanvas.getContext('2d');
    previewCanvas.width = canvas.width;
    previewCanvas.height = canvas.height;
    ctx.clearRect(0, 0, previewCanvas.width, previewCanvas.height);
    ctx.drawImage(canvas, 0, 0);

    // masukkan hasil crop ke hidden input (base64)
    croppedInput.value = canvas.toDataURL('image/png');
  });

