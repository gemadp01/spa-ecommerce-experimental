<template>
    <Head title="Show Product" />
    <Link :href="route('index_product', product)">Back</Link>
    <p>Name: {{ product.name }}</p>
    <p>Description: {{ product.description }}</p>
    <p>Price: Rp{{ product.price }}</p>
    <p>Stock: {{ product.stock }}</p>
    <Link :href="route('edit_product', product)">Edit Product</Link>
    <img :src="`storage/${product.image}`" alt="" class="w-32" />
</template>

<script>
import { Head, Link } from "@inertiajs/vue3";

export default {
    components: {
        Head,
        Link,
    },
    props: {
        product: Object,
    },
};
</script>
