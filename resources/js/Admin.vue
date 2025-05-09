<script>
import api from "./api.js";
import router from "./router/index.js";

export default {
    data() {
        return {
            count: 0,
            accessToken: null,
            person: [],
        };
    },
    mounted() {
        this.getAccessToken()
        this.getPerson()
    },

    methods: {
        getPerson() {
            api.post('/api/auth/me')
                .then ( res => {
                    this.person = res.data;
                })
        },
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
    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <p class="animation__shake">Ink-Ice</p>
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{route('admin.index')}}" class="brand-link">
                <span class="brand-text font-weight-light"><h2>Ink-Ice</h2></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-list"></i>
                                <p>
                                    Заказы
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.product')}}" class="nav-link">
                                <i class="nav-icon fa fa-ice-cream"></i>
                                <p>
                                    Продукты
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.category')}}" class="nav-link">
                                <i class="fas fa-grip-horizontal"></i>
                                <p>
                                    Категории
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.tag')}}" class="nav-link">
                                <i class="nav-icon fa fa-marker"></i>
                                <p>
                                    Теги
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.user')}}" class="nav-link">
                                <i class="nav-icon fa fa-user"></i>
                                <p>
                                    Пользователи
                                </p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <router-view></router-view>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014- <a href="{{route('admin.index')}}">Ink-Ice</a>.</strong>
            Все права защищены.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    </body>
</template>

<style scoped>

</style>
