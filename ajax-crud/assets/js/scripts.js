const form = document.querySelector('#form');

const formData = new FormData(form);

console.log(form);

fetch('index.php', {
  method: 'post',
  body: formData
})
  .then(res => res.text())
  //.then(data => console.log(data))

//

const message = document.querySelector('#message');

form.addEventListener('submit', e => {
  e.preventDefault();
  console.log('He hecho clic');
  message.textContent = 'Hello world';
  message.classList.toggle('visible');
})