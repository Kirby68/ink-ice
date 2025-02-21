<script>
import axios from "axios";
import ImageSlider from "../../components/HelloWorld.vue";

export default {
    name: "App",
    components: {
        ImageSlider
    },
  data() {
    return {
      products: []
    };
  },
  mounted() {
    this.getProducts()
  },

  methods: {
    getProducts() {
      this.axios.get('http://127.0.0.1:8000/api/products')
          .then(res => {
              this.products = res.data
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
    <main>
      <!--Start Products Six-->
      <section class="products-three pt-60 pb-60 overflow-hidden">
        <div class="auto-container container">
          <div class="section-header style3 text-center wow fadeInUp animated">
            <h2> Лучшие вкусы </h2>
            <p> Топ мороженного за неделю </p>
          </div>
            <div id="app">
                <ImageSlider />
            </div>
          <div class="row">
              <div v-if="products" v-for="product in products" class="col-xl-3 col-lg-4 col-6 wow fadeInUp animated">
                  <div class="products-three-single w-100 wow fadeInUp animated mt-30">
                      <div class="products-three-single-img">
                          <router-link :to="{name: 'show', params: {id: product.id}}" class="d-block"><img
                              :src="product.image_url" class="first-img" alt=""/> <img
                              :src="product.image_url" alt="" class="hover-img" style="height: 300px"/>
                          </router-link>
                          <a @click.prevent="addToCard(product)" class="addcart btn--primary style2"> Добавить в корзину </a>
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
      <!--End Products Six-->
    </main>
  </div>
</template>

<style>
div#app {
    font-family: Arial, sans-serif;
    color: #2c3e50;
    text-align: center;
}
</style>
