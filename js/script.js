const btnSearch = document.querySelector('.btnSearch');
const keyword = document.querySelector('.keyword');
const container = document.querySelector('.container');

btnSearch.style.display = 'none';

keyword.addEventListener('keyup', function() {
   /* const xhr = new XMLHttpRequest();
   xhr.onreadystatechange = function() {
      if(xhr.readyState == 4 && xhr.status == 200) {
         container.innerHTML = xhr.responseText;
      }
   };
   xhr.open('get', 'ajax/ajax-search.php?keyword=' + keyword.value);
   xhr.send(); */

fetch('ajax/ajax-search.php?keyword=' + keyword.value)
   .then((response) => response.text())
   .then((response) => (container.innerHTML = response));
});

function previewImage() {
   const playerImage = document.querySelector('.playerImage');
   const imgPreview = document.querySelector('.imgPreview');

   const oFReader = new FileReader();
   oFReader.readAsDataURL(playerImage.files[0]);

   oFReader.onload = function (oFREvent) {
      imgPreview.src = oFREvent.target.result;
   };
}