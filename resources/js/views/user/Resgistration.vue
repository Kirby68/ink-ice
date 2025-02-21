<script>
export default {
    data() {
        return {
            name: null,
            email: null,
            password: null,
            password_confirmation: null,
            surname: null,
            patronymic: null,
            age: null,
            address: null,
            gender: null,
        }
    },
    methods: {
        Login() {
            this.axios.post('/api/registration', {
                'name': this.name,
                'surname': this.surname,
                'patronymic': this.patronymic,
                'age': this.age,
                'address': this.address,
                'gender': this.gender,
                'email': this.email,
                'password': this.password,
                'password_confirmation': this.password_confirmation
            })
                .then(res => {
                        this.$router.push({name: 'login'})
                })
        }
    }
}
</script>

<template>
    <div style="display: flex;
justify-content: center;
align-items: center;">
        <div class="w-25" style="margin-top: 50px; margin-bottom: 50px; ">
            <input class="form-control mt-3 mb-3" type="text" name="name" v-model="name" placeholder="Имя">
            <input class="form-control mt-3 mb-3" type="text" name="surname" v-model="surname" placeholder="Фамилия">
            <input class="form-control mt-3 mb-3" type="text" name="patronymic" v-model="patronymic" placeholder="Отчество">
            <input class="form-control mt-3 mb-3" type="number" name="age" v-model="age" placeholder="Возвраст">
            <input class="form-control mt-3 mb-3" type="text" name="address" v-model="address" placeholder="Адрес">
            <select name="gender" v-model="gender" class="custom-select form-control  mt-3 mb-3" id="exampleSelectBorder">
                <option value="1">Мужской</option>
                <option value="2">Женский</option>
            </select>
            <input class="form-control mt-3 mb-3" type="email" name="email" v-model="email" placeholder="Электронная почта">
            <input class="form-control mt-3 mb-3" type="password" name="password" v-model="password"
                   placeholder="Пароль">
            <input class="form-control mt-3 mb-3" type="password" name="Повторите пароль"
                   v-model="password_confirmation" placeholder="Password_confirmed">
            <input type="submit" class="btn btn-primary mt-3 mb-3" value="Зарегестрироватся" @click.prevent="Login">
        </div>
    </div>
</template>

<style scoped>

</style>
