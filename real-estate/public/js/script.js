// Set and show selected price on input type range
price.addEventListener('change', setPrice);

function setPrice() {
  const priceInput = document.querySelector('.price input');
  const priceOutput = document.querySelector('.price output');

  priceInput.setAttribute('value', priceInput.value);
  // Add formatted price value to the HTML <output> placeholder
  priceOutput.textContent = Number(price.value).toLocaleString() + '€';
}
