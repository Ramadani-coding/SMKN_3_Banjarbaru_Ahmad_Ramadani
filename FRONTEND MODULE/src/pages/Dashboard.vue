<template>
    <div class="container">

        <div class="card" style="width: 18rem;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item card-header">Data Validation</li>
                <li class="list-group-item">Status</li>
                <li class="list-group-item">Job Category</li>
                <li class="list-group-item">Job Position</li>
                <li class="list-group-item">Reason Accepted</li>
                <li class="list-group-item">Validator</li>
                <li class="list-group-item">Validator Notes</li>
            </ul>
        </div>
    </div>
</template>

<script setup>
import { onMounted } from "vue";
import api from '../http/api'

onMounted(async () => {
    const { data } = await api.get('/v1/validations')
    console.log(data)
})
</script>