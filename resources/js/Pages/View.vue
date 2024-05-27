<script setup>
import { Link } from '@inertiajs/vue3'
import 'tailwindcss/tailwind.css';
import { useForm } from '@inertiajs/vue3'
import { ref } from 'vue'
import Layout from '@/Layouts/Layout.vue';

const props = defineProps({
    thrifty: Object
})

defineOptions({
    layout: Layout
});

const showEdit = ref(false)

const form = useForm({
    brand_name: props.thrifty.brand_name,
    description: props.thrifty.description,
    price: props.thrifty.price,
})

const submit = () => {
    form.put('/thriftys/' + props.thrifty.id)
}

const delEmp = () => {
    const del = confirm("Are you sure you want to delete this thrifty item?")
    if (del)
        form.delete('/thriftys/' + props.thrifty.id)
}
</script>


<template>
    <div class="p-8">
        <h1 class="text-4xl">View Thrifty</h1>

        <div class="border bordp p-4 rounded m-6 fs-5 view-container">
            <table v-if="!showEdit" class="tanle-striped flex">
                <tr class="flex flex-col border-end border-solid mr-2 p-2">
                    <th>Brand Name: </th>
                    <th>Description: </th>
                    <th>Price: </th>
                </tr>
                <tr class="flex flex-col">
                    <td>{{ thrifty.brand_name }}</td>
                    <td>{{ thrifty.description }}</td>
                    <td>{{ thrifty.price }}</td>
                </tr>
            </table>
            
            <div v-if="showEdit">
                <form @submit.prevent="submit">
                    <div class="mb-3">
                        <label for="brand_name">Brand_Name: </label>
                        <input type="text" id="brand_name" class="w-full" v-model="form.brand_name">
                    </div>
                    <div class="mb-3">
                        <label for="description">Description: </label>
                        <input type="text" id="description" class="w-full" v-model="form.description">
                    </div>
                    <div class="mb-3">
                        <label for="price">Price: </label>
                        <input type="text" id="price" class="w-full" v-model="form.price">
                    </div>
                    <button type="submit" class="bg-blue-700 text-white py-2 px-3 rounded">Submit</button>
                </form>
            </div>

            <div class="mt-2 flex">
                <Link href="/thriftys" class="btn-success btn ">Back</Link>
                <button class="btn btn-danger text-white rounded ms-2" @click="delEmp">Delete</button>
                <button class="btn btn-primary rounded ms-2" @click="showEdit = !showEdit">{{ showEdit ? 'Cancel' : 'Edit' }}</button>
            </div>
        </div>
    </div>
</template>
