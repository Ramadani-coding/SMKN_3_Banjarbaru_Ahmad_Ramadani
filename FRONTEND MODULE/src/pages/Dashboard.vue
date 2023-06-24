<template>
    <div class="container">

        <div class="card" style="width: 18rem;">
            <ul class="list-group list-group-flush">
                <div class="card-header">
                    Data Validation
                </div>
                <div class="list" v-for="validation in validations" :key="validation.id">
                    <li class="list-group-item"> {{ validation.status }} </li>
                    <li class="list-group-item"> {{ validation.Job_Category }} </li>
                </div>
            </ul>
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref } from "vue";
import api from '../http/api'


const validations = ref([])


onMounted(async () => {
    const { data } = await api.get('/v1/validations')
    console.log(data)

    validations.value = data.data
})
</script>