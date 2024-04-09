<template>
    <Head title="Show Product" />
    <AppLayout>
        <Link :href="route('index_product', product)">Back</Link>
        <p>Name: {{ product.name }}</p>
        <p>Description: {{ product.description }}</p>
        <p>Price: Rp{{ product.price }}</p>
        <p>Stock: {{ product.stock }}</p>
        <Link :href="route('edit_product', product)">Edit Product</Link>
        <img :src="`/storage/products/${product.image}`" :alt="product.name" />
    </AppLayout>
</template>

<script>
import { Head, Link } from "@inertiajs/vue3";
import AppLayout from "../../Layouts/App.vue";

export default {
    components: {
        Head,
        AppLayout,
        Link,
    },
    props: {
        product: Object,
    },
};
</script>
