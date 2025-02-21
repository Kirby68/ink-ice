<script>
import axios from "axios";
export default {
  data() {
    return {
      products: [

      ]
    };
  },
  mounted() {
    this.getProduct()
  },

  methods: {
    getProduct(id) {
      this.axios.get(`http://127.0.0.1:8000/api/products/${this.$route.params.id}`)
          .then(res => {
            this.products = res.data.data
          })
    }
  }
}
</script>

<template>
<div>
  <main>
    <!--Start Shop Details Breadcrumb-->
    <div class="shop-details-breadcrumb wow fadeInUp animated overflow-hidden ">
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <div class="shop-details-inner">
              <ul class="shop-details-menu">
                <li>Главная</li>
                <li class="active">{{ products.name }}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--End Shop Details Breadcrumb-->
    <!--Start Shop Details Top-->
    <section class="shop-details-top three">
      <div class="container">
        <div class="row mt--30">
          <div class="col-xl-6 col-lg-6 mt-30 wow fadeInUp animated">
            <div class="single-product-box">
              <div class="big-product single-product-three slider-for">
                <div>
                  <div class="single-item">
                    <img  :src="products.image_url" alt="" style="height: 600px"><a href="#0" class="love"> <i class="flaticon-like"></i> </a>
                  </div>
                </div>
                </div>
              </div>
            </div>
          <div class="col-xl-6 col-lg-6 mt-30 wow fadeInUp animated">
            <div class="shop-details-top-right three">
              <div class="shop-details-top-right-content-box">
                <div class="shop-details-top-title m-0">
                  <h3>{{products.name}}</h3>
                </div>
                <div class="shop-details-top-review-box">
                  <div class="shop-details-top-review">
                    <ul>
                      <li><i class="flaticon-star-1"></i></li>
                      <li><i class="flaticon-star-1"></i></li>
                      <li><i class="flaticon-star-1"></i></li>
                      <li><i class="flaticon-star-1"></i></li>
                      <li><i class="flaticon-star-1"></i></li>
                    </ul>
                    <p>(2 Отзыва)</p>
                  </div>
                </div>
                <ul class="shop-details-top-info">
                  <li><span>Категория:</span> {{ products.category }}</li>
                  <li><span>Теги:</span> ---</li>
                  <li><span>Описание:</span> {{ products.description }}</li>
                  <li><span>Об товаре:</span> {{ products.content }}</li>
                </ul>
                <div
                    class="shop-details-top-price-box d-flex align-items-center justify-content-between flex-wrap ">
                  <div>
                    <h3 class="pe-1"> {{products.price}} </h3>
                  </div>
                </div>
                <div class="product-quantity m-0">
                  <h4>Quantity</h4>
                  <div class="product-quantity-box d-flex align-items-center flex-wrap">
                    <div class="qty mr-2">
                      <div class="qtySelector text-center"> <span class="decreaseQty"><i
                          class="flaticon-minus"></i> </span> <input type="number"
                                                                     class="qtyValue" value="1" /> <span class="increaseQty"> <i
                          class="flaticon-plus"></i> </span> </div>
                    </div>
                    <div class="product-quantity-check"> <i class="flaticon-select"></i>
                      <p>Осталось: {{products.count}}</p>
                    </div>
                  </div>
                </div>
                <div class="shop-details-top-cart-box-btn"> <button class="btn--primary style2 "
                                                                    type="submit">Добавить в корзину</button> </div>
                <div class="shop-details-top-buy-now-btn"> <a href="№" class="btn--primary">Купить сейчас</a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End Shop Details Top-->
  </main>
</div>
</template>

<style scoped>

</style>
