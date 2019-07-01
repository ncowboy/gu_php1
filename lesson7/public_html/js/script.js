"use strict";
const cartBtn = document.querySelector('.cart-toggle');
cartBtn.addEventListener('click', ()=>{
  document.querySelector('.cart-content').classList.toggle('hidden');
});