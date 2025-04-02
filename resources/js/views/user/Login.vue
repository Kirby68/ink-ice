<script>
export default {
    data() {
        return {
            email: null,
            password: null,
        }
    },
    methods: {
        async Login() {
            try {
                axios.post('/api/auth/login', {
                    'email': this.email,
                    'password': this.password
                }).then(res => {
                    this.$store.dispatch('login', {
                        token: res.data.access_token
                    });
                    this.$router.push({name: 'personal'})
                })
            } catch (error) {
                console.log('Ошибка авторизации: ', error)
            }
        }
    }
}
</script>

<template>
    <div style="display: flex;
justify-content: center;
align-items: center;">
        <div class="w-25" style="margin-top: 200px; margin-bottom: 200px; ">
            <input class="form-control mt-3 mb-3" type="email" name="email" v-model="email" placeholder="Email">
            <input class="form-control mt-3 mb-3" type="password" name="password" v-model="password"
                   placeholder="Password">
            <input type="submit" class="btn btn-primary mt-3 mb-3" value="sign in" @click.prevent="Login">
        </div>
    </div>
</template>

<style scoped>

</style>
