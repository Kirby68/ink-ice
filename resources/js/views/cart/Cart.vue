<script>
import axios from "axios";
import api from "../../api.js";

export default {
    data() {
        return {
            products: [],
            count: null,
            id: null,
        };
    },
    mounted() {
        this.getCartProducts()
        this.getUser()
    },

    computed: {
        totalPrice() {
            let total = 0
            this.products.forEach(product => {
                total += product.price * product.qty
            })
            return total
        }
    },

    methods: {

        getUser(){
            api.post('/api/auth/me')
                .then( res => {
                    this.id = res.data.id
                })
        },

        storeOrder() {
            this.axios.post('/api/auth/orders', {
                'products': this.products,
                'user_id': this.id,
                'total_price': this.totalPrice
            })
                .then(res => {
                    console.log(res);
                })
        },

        getCartProducts() {
            this.products = JSON.parse(localStorage.getItem('cart'))
        },
        plusQty(product) {
            product.qty++
            this.updateCart()
        },
        minusQty(product) {
            if (product.qty === 1) return
            product.qty--
            this.updateCart()
        },
        remove(id) {
            this.products = this.products.filter(product => {
                return product.id !== id
            })
            this.updateCart()
        },
        updateCart() {
            localStorage.setItem('cart', JSON.stringify(this.products))
        },
    }
}
</script>

<template>
    <div>
        <main class="overflow-hidden ">
            <!--Start Breadcrumb Style2-->
            <section class="breadcrumb-area"
                     style="background-image: url(@/assets/images/inner-pages/breadcum-bg.png);">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-content text-center wow fadeInUp animated">
                                <h2>Cart</h2>
                                <div class="breadcrumb-menu">
                                    <ul>
                                        <li><a href="#"><i class="flaticon-home pe-2"></i>Главная</a></li>
                                        <li><i class="flaticon-next"></i></li>
                                        <li class="active">Корзина</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--End Breadcrumb Style2-->
            <!--Start cart area-->
            <section class="cart-area pt-120 pb-120">
                <div class="container">
                    <div class="row wow fadeInUp animated">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="cart-table-box">
                                <div class="table-outer">
                                    <table class="cart-table">
                                        <thead class="cart-header">
                                        <tr>
                                            <th class="">Название</th>
                                            <th class="price">Цена</th>
                                            <th>Количество</th>
                                            <th>Итоговая цена</th>
                                            <th class="hide-me"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="product in products">
                                            <td>
                                                <div class="thumb-box">
                                                    <router-link :to="{name: 'show', params: { id: product.id}}"
                                                                 class="thumb">
                                                        <img :src="product.image_url" alt="" style="height: 100px">
                                                    </router-link>
                                                    <router-link :to="{name: 'show', params: { id: product.id}}"
                                                                 class="title">
                                                        <h5> {{ product.name }} </h5>
                                                    </router-link>
                                                </div>
                                            </td>
                                            <td>{{ product.price }}</td>
                                            <td class="qty">
                                                <div class="qtySelector text-center"> <span
                                                    @click.prevent="minusQty(product)" class="decreaseQty"><i
                                                    class="flaticon-minus"></i> </span> <input type="number"
                                                                                               class="qtyValue"
                                                                                               :value="product.qty"/>
                                                    <span @click.prevent="plusQty(product)" class="increaseQty"> <i
                                                        class="flaticon-plus"></i> </span></div>
                                            </td>
                                            <td class="sub-total">{{ product.price * product.qty }}</td>
                                            <td>
                                                <div @click.prevent="remove(product.id)" class="remove"><i
                                                    class="flaticon-cross"></i></div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row w-25 mt-4">
                        <input @click.prevent="storeOrder" type="submit" class="btn btn-primary" value="оформить">
                    </div>
                    <div class="row pt-120">
                        <div class="col-xl-6 col-lg-7 wow fadeInUp animated">
                            <div class="cart-total-box">
                                <div class="inner-title">
                                    <h3>Итог корзины</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt--30">
                        <div class="col-xl-6 col-lg-7 wow fadeInUp animated">
                            <div class="cart-total-box mt-30">
                                <div class="table-outer">
                                    <table class="cart-table2">
                                        <thead class="cart-header clearfix">
                                        <tr>
                                            <th colspan="1" class="shipping-title">Доставка</th>
                                            <th class="price">450 руб</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="shipping"> Способ доставки</td>
                                            <td class="selact-box1">
                                                <ul class="shop-select-option-box-1">
                                                    <li><input type="checkbox" name="free_shipping" id="option_1"
                                                               checked=""> <label for="option_1"><span></span>Бесплатная доставка</label></li>
                                                    <li><input type="checkbox" name="flat_rate" id="option_2"> <label
                                                        for="option_2"><span></span>Доставка до дома</label></li>
                                                    <li><input type="checkbox" name="local_pickup" id="option_3">
                                                        <label for="option_3"><span></span>Пункт выдачи</label></li>
                                                </ul>
                                                <h4>Сумма с доставкой</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4 class="total">Итог</h4>
                                            </td>
                                            <td class="subtotal">450 руб</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-5 wow fadeInUp animated">
                            <div class="cart-check-out mt-30">
                                <h3>Check Out</h3>
                                <ul class="cart-check-out-list">
                                    <li>
                                        <div class="left">
                                            <p>Итог корзины</p>
                                        </div>
                                        <div class="right">
                                            <p>{{ totalPrice }} руб</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left">
                                            <p>Доставка</p>
                                        </div>
                                        <div class="right">
                                            <p><span>Доставка до дома: </span> 450 руб</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="left">
                                            <p>Итоговая стоимость: </p>
                                        </div>
                                        <div class="right">
                                            <p>2550 руб</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--End cart area-->
        </main>
    </div>
</template>

<style scoped>

</style>
