<script setup>
import { Link } from '@inertiajs/vue3'
import Layout from '@/Layouts/Layout.vue';

const props = defineProps({
    thrifties: Array
});

defineOptions({
    layout: Layout
});
</script>

<template>
    <div class="bg-white container">
        <div class="flex">
            <h1 class="text-4xl my-3 pink flex-1"> Thrifty List</h1>
            <Link href='/thriftys/create' class="p-2 btn-primary btn rounded h-50 mt-3"> Add Thrifty</Link>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="table-pink">
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="thrifty in thrifties" :key="thrifty.id">
                    <td>{{ thrifty.brand_name }}</td>
                    <td>{{ thrifty.description }}</td>
                    <td>{{ thrifty.price }}</td>
                    <td class='text-center'>
                        <Link :href="'/thriftys/' + thrifty.id" class='btn'>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                            </svg>
                        </Link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
