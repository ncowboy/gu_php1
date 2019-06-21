  <div class="product-item col-lg-3 col-md-6 mb-4">
    <div class="card h-100">
      <img src="" alt="product.product_name" class="card-img-top">
      <div class="card-body d-flex flex-column justify-content-between">
        <h5 class="card-title">{{ product.product_name }}</h5>
        <p class="card-text">Цена: {{ product.price }} р.</p>
        <button @click="addToCart(product)" class="cart-button btn btn-primary" :data-id="product.id_product"
                type="submit"><i
            class="fas fa-cart-arrow-down"></i> Добавить
        </button>
      </div>
    </div>
  </div>