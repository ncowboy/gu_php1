"use strict";
/* Cart visibility */

const cartBtn = document.querySelector('.cart-toggle');
cartBtn.addEventListener('click', () => {
  document.querySelector('.cart-content').classList.toggle('hidden');
});

/* Cart */

$('.cart-button').click(function (event) {
  event.preventDefault();
  const $this = $(this);
  const $form = $this.parent().parent();
  const $url = $form.attr('action');
  const $id = $this.data('id');
  const $qty = $form.find(`input[name="cart${$id}[quantity]"]`).val();
  $.post($url, {
    cart: {
      product_id: $id,
      quantity: $qty,
    }
  }, function(data) {
    console.log(data);
  });
});
