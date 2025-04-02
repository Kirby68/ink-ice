<script>
import {RouterLink, RouterView} from 'vue-router'
import axios from "axios";
import api from "./api.js";
import router from "./router/index.js";
import {mapActions, mapMutations, mapState} from "vuex";

export default {
    data() {
        return {
            count: 0,
            accessToken: null,
        };
    },
    mounted() {
        this.getAccessToken()
    },

    methods: {
        getAccessToken(){
            this.accessToken = localStorage.getItem('access_token')
            const token = localStorage.getItem('access_token')
            if(token){
                this.$store.dispatch('login', {token})
            }
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
        logout() {
            api.post('/api/auth/logout')
                .then( res => {
                    this.$store.dispatch('logout')
                    router.push({name: 'index'})
                })
        }
    }
}
</script>

<template>
    <div>
        <header class="header-style-3">
            <!-- Start Desktop Menu -->
            <div class="menubox">
                <div class="container-fluid">
                    <div class="row d-lg-none d-block">
                        <div class="mobile-menu ">
                            <div class="mobile-menu__menu-top border-bottom-0">
                                <div class="container">
                                    <div class="row">
                                        <div class="menu-info d-flex justify-content-between align-items-center">
                                            <div class="menubar"><span></span> <span></span> <span></span></div>
                                            <a
                                                href="№" class="logo"> <img
                                                src="/public/assets/images/logo/logo.png"
                                                alt=""> </a>
                                            <div class="cart-holder">
                                                <a href="#0" class="cart cart-icon position-relative">
                                                    <i class="flaticon-shopping-cart"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-closer"></div>
                            <div class="mobile-menu__sidebar-menu">
                                <div class="menu-closer two"><span> Закрыть меню</span> <span class="cross"><i
                                    class="flaticon-cross"></i></span></div>
                                <ul class="page-dropdown-menu">
                                    <li class="dropdown-list">
                                        <router-link to="/"><span>Главная</span></router-link>
                                    </li>
                                    <li class="dropdown-list">
                                        <router-link to="/list"><span>Продукты</span></router-link>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="d-lg-block d-none">
                        <div class="row g-0 position-relative">
                            <div class="col-lg-3 d-flex align-items-center justify-content-center border-rit ">
                                <div class="logo">
                                    <router-link to="/"><img src="/public/assets/images/logo/logo.png" alt="" style="width: 150px">
                                    </router-link>
                                </div>
                            </div>
                            <div class="col-lg-9 g-0 p-0">
                                <div class="border-one"></div>
                                <div class="row g-0 holder">
                                    <div class="col-12">
                                        <div class="mega-menu-default mega-menu d-lg-block d-none">
                                            <div class=" d-flex align-items-center justify-content-between ">
                                                <nav>
                                                    <ul
                                                        class="page-dropdown-menu d-flex align-items-center justify-content-center">
                                                        <li class="dropdown-list">
                                                            <router-link to="/"><span>Главная</span></router-link>
                                                        </li>
                                                        <li class="dropdown-list">
                                                            <router-link to="/list"><span>Продукты</span></router-link>
                                                        </li>
                                                    </ul>
                                                </nav>


                                                <div class="right d-flex align-items-center justify-content-end">
                                                    <ul class="main-menu__widge-box d-flex align-items-center ">
                                                        <li class="d-lg-block d-none" v-if="$store.getters.isAuthenticated === true">
                                                            <router-link class="m-3"  :to="{name: 'personal'}">personal</router-link>
                                                        </li>
                                                        <li  class="d-lg-block d-none" v-if="$store.getters.isAuthenticated === true">
                                                            <input @click.prevent="logout(accessToken)" type="submit" class="btn btn-primary" value="выйти">
                                                        </li>
                                                        <li class="d-lg-block d-none" v-if="$store.getters.isAuthenticated === false">
                                                            <router-link to="/loginn">Вход</router-link>
                                                        </li>
                                                        <li class="d-lg-block d-none" v-if="$store.getters.isAuthenticated === false">
                                                            <router-link to="/registrationn">Регистрация</router-link>
                                                        </li>
                                                        <li class="d-lg-block d-none"><a href="№"
                                                                                         class="number"><i
                                                            class="flaticon-heart"></i> <span
                                                            class="count">(2)</span> </a></li>
                                                        <li class="cartm">
                                                            <router-link to="/cart" class="number cart-icon"><i
                                                                class="flaticon-shopping-cart"></i><span
                                                                class="count">({{count}})</span></router-link>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="sticy-header">
                <div class="mobile-menu d-lg-none d-block">
                    <div class="mobile-menu__menu-top border-bottom-0">
                        <div class="container">
                            <div class="row">
                                <div class="menu-info d-flex justify-content-between align-items-center">
                                    <div class="menubar"><span></span> <span></span> <span></span></div>
                                    <a
                                        href="№" class="logo"> <img src="/public/assets/images/logo/logo.png"
                                                                             alt=""> </a>
                                    <div class="cart-holder">
                                        <a href="#0" class="cart cart-icon position-relative">
                                            <i class="flaticon-shopping-cart"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container position-relative d-lg-block d-none">
                    <div class="d-flex align-items-center justify-content-between"><a href="№"
                                                                                      class="logo me-2">
                        <img src="/public/assets/images/logo/logo.png" alt=""> </a>
                        <div class="mega-menu-default mega-menu d-lg-block d-none">
                            <div class="container ">
                                <div class="row">
                                    <nav>
                                        <ul
                                            class="page-dropdown-menu d-flex align-items-center justify-content-center">
                                            <li class="dropdown-list">
                                                <router-link to="/"><span>Главная</span></router-link>
                                            </li>
                                            <li class="dropdown-list">
                                                <router-link to="/list"><span>Продуктыt</span></router-link>
                                            </li>
                                        </ul>
                                    </nav>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </header>

        <router-view></router-view>

        <!--  Footer Three start -->
        <footer class="footer-default footer-3 ">
            <div class="footer-default__shap_1 position-absolute "><img
                src="/public/assets/images/shape/footer-shape-1.png"
                alt=""></div>
            <!--Start Footer-->
            <div class="footer-default__main-footer position-relative">
                <div class="container">
                </div>
            </div> <!-- footer-bottom Footer-->
            <div class="footer_bottom position-relative">
                <div class="container">
                    <div class="footer_bottom_content">
                        <div class="copyright wow fadeInUp animated">
                            <strong>Copyright &copy; 2014-2024 Ink-Ice.</strong>
                            Все права защищены.
                        </div>
                        <div class="footer-payment wow fadeInUp animated">
                            <a href="#0"> <img src="/public/assets/images/home-four/method-1.jpg" alt="Оплата"> </a>
                            <a href="#0"> <img src="/public/assets/images/home-four/method-2.jpg" alt="Оплата"> </a>
                            <a href="#0"> <img src="/public/assets/images/home-four/method-3.jpg" alt="Оплата"> </a>
                            <a href="#0"> <img src="/public/assets/images/home-four/method-4.jpg" alt="Оплата"> </a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<style scoped>

</style>
