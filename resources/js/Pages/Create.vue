<!-- Create.vue -->
<script setup>
    import { Link } from '@inertiajs/vue3';
    import { useForm } from '@inertiajs/vue3';
    import Layout from '@/Layouts/Layout.vue';

    defineOptions({
        layout: Layout
    });

    const form = useForm({
        brand_name: '',
        description: '',
        price: '',
    });

    
    const submit = () => {
        form.post('/thriftys'); 
    };
</script>

<template>
    <div class="p-8">
        <h1 class="text-4xl my-3 flex-1 m-2 fw-bold">Add Thrifty</h1>

        <div class="border p-4 rounded w-2/4 m-4">
            <form @submit.prevent="submit">
                <table>
                    <tr>
                        <th class="text-left">Brand Name:</th>
                        <td class="px-4">
                            <input class="w-full rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" v-model="form.brand_name" type="text">
                        </td>
                    </tr>
                    <tr>
                        <th class="text-left">Description:</th>
                        <td class="px-4">
                            <input class="w-full rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" v-model="form.description" type="text">
                        </td>
                    </tr>
                    <tr>
                        <th class="text-left">Price:</th>
                        <td class="px-4">
                            <input class="w-full rounded-md py-2 px-3 focus:outline-none focus:border-blue-500" v-model="form.price" type="text">
                        </td>
                    </tr>
                </table>

                <div class="text-right">
                    <Link href="/thriftys" class="btn text-white bold bg-success">Back</Link>
                    <button type="submit" class="btn ml-2 text-white bg-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</template>
