<h1>Каталог</h1>
<div class="products row mt-5">
  <?php foreach (getProducts() as $product): ?>
    <div class="product-item col-lg-3 col-md-6 mb-4" data-id="<?= $product['id'] ?>">
      <div class="card h-100">
        <img src="uploads/<?= $product['img'] ?>" alt="<?= $product['name'] ?>" class="card-img-top">
        <div class="card-body d-flex flex-column justify-content-between">
          <h5 class="card-title"><?= $product['name'] ?></h5>
          <p class="card-text">Цена: <?= $product['price'] ?> р.</p>
            <a href="product?id=<?= $product['id'] ?>" class="btn btn-link">Подробнее</a>
            <form class="form-inline" action="#" method="post">
              <div class="btn-group mx-auto">
                <input class="form-control" type="number" value="1" min="0" max="10">
                <button type="submit" class="cart-button btn btn-primary" title="В корзину"
                        data-id="<?= $product['id'] ?>" type="submit"><i class="fas
            fa-cart-arrow-down"></i>
                </button>
            </form>

          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
