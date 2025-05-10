<script>
import axios from "axios";
export default {
  data() {
    return {
      products: [

      ],
        colvo: 1,
    };
  },
  mounted() {
    this.getProduct()
  },

  methods: {
    getProduct(id) {
      this.axios.get(`/api/products/${this.$route.params.id}`)
          .then(res => {
            this.products = res.data.data
          })
    },
      plusQty() {
          this.colvo++
      },
      minusQty() {
          if (this.colvo === 1) return
          this.colvo--
      },
      addToCard(product) {

          let cart = localStorage.getItem('cart')
          let newProduct = [
              {
                  'id': product.id,
                  'image_url': product.image_url,
                  'name': product.name,
                  'price': product.price,
                  'qty': this.colvo
              }
          ]

          if (!cart) {
              localStorage.setItem('cart', JSON.stringify(newProduct));
          } else {
              cart = JSON.parse(cart)
              cart.forEach(productInCart => {
                  if(productInCart.id === product.id) {
                      productInCart.qty = Number(productInCart.qty) + 1
                      newProduct = null
                  }
              })
              Array.prototype.push.apply(cart, newProduct)
              localStorage.setItem('cart', JSON.stringify(cart))
          }
      },
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
                    <h3 class="pe-1"> {{products.price}} <p>руб</p></h3>
                  </div>
                </div>
                <div class="product-quantity m-0">
                  <h4>Quantity</h4>
                  <div class="product-quantity-box d-flex align-items-center flex-wrap">
                    <div class="qty mr-2">
                      <div class="qtySelector text-center"> <span class="decreaseQty"><i
                          class="flaticon-minus" @click.prevent="minusQty()"></i> </span> <input type="number"
                                                                     class="qtyValue" :value="colvo" disabled/> <span class="increaseQty"> <i
                          class="flaticon-plus" @click.prevent="plusQty()"></i> </span> </div>
                    </div>
                    <div class="product-quantity-check"> <i class="flaticon-select"></i>
                      <p>Осталось: {{products.count}}</p>
                    </div>
                  </div>
                </div>
                <div class="shop-details-top-cart-box-btn"> <button @click.prevent="addToCard(products)" class="btn--primary style2 "
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
