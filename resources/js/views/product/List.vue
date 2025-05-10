<script>
import axios from "axios";

export default {
  data() {
    return {
      products: [],
      count: null
    };
  },
  mounted() {
    this.getProducts()
  },

  methods: {
    getProducts() {
      this.axios.get('/api/products')
          .then(res => {
              this.products = res.data;
              this.count = this.products.length
          })
    },

    addToCard(product) {

      let cart = localStorage.getItem('cart')
      let newProduct = [
        {
          'id': product.id,
          'image_url': product.image_url,
          'name': product.name,
          'price': product.price,
          'qty': 1
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
    <main class="overflow-hidden ">
      <!--Start product-grid-->
      <section class="product-grid pt-60 pb-120">
        <div class="container">
          <div class="row">
            <div class="col-xl-12">
              <div class="shop-grid-page-top-info justify-content-md-between justify-content-center">
                <div class="left-box wow fadeInUp animated">
                  <p>Показ {{ count }} результатов</p>
                </div>
                <div
                    class="right-box justify-content-md-between justify-content-center wow fadeInUp animated">
                  <div class="short-by">
                    <div class="select-box"><select class="wide">
                      <option data-display="Short by latest">По созданию</option>
                      <option value="1">Лучшие продажи</option>
                      <option value="2">По алфавиту, А-Я</option>
                      <option value="3">По алфавиту, Я-А</option>
                      <option value="3">Цена, От дешёвой до дорогой</option>
                      <option value="3">Цена, От дорогой до дешёвой</option>
                      <option value="3">Дата, от старого до нового</option>
                    </select></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div v-if="products" v-for="product in products" class="col-xl-3 col-lg-4 col-6 wow fadeInUp animated">
              <div class="products-three-single w-100 wow fadeInUp animated mt-30">
                <div class="products-three-single-img">
                  <router-link :to="{name: 'show', params: {id: product.id}}" class="d-block"><img
                      :src="product.image_url" class="first-img" alt=""/> <img
                      :src="product.image_url" alt="" class="hover-img" style="height: 300px"/>
                  </router-link>
                  <a @click.prevent="addToCard(product)" href="№" class="addcart btn--primary style2"> Добавить в корзину </a>
                </div>
                <div class="products-three-single-content text-center"><span>{{ product.category }}</span>
                  <h5>
                    <router-link :to="{name: 'show', params: {id: product.id}}">{{ product.name }}</router-link>
                  </h5>
                  <p>{{ product.price }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--End product-grid-->
    </main>
  </div>
</template>

<style scoped>

</style>
