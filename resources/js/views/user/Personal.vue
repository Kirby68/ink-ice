<script>
import api from "../../api.js";

export default {

    data(){
        return {
            person: []
        }
    },

    mounted() {
        this.getPerson()
    },

    methods: {
        getPerson() {
            api.post('/api/auth/me')
                .then ( res => {
                    this.person = res.data;
                    console.log(res.data);
                })
        }
    }

}

</script>

<template>
    <div style="
    display: flex;
justify-content: center;
align-items: center;">
        <div class="w-25" style="margin-top: 11%; margin-bottom: 11%; ">
            <h4>id: {{person.id}}</h4>
            <h4>name: {{person.name}}</h4>
            <h4>surname: {{person.surname}}</h4>
            <h4>patronymic: {{person.patronymic}}</h4>
            <h4>email: {{person.email}}</h4>
            <h4>address: {{person.address}}</h4>
            <h4>age: {{person.age}}</h4>
        </div>
    </div>
</template>

<style scoped>

</style>
