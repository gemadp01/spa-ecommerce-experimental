<template>
    <Head title="Product List" />

    <AppLayout>
        <Link :href="route('create_product')">Add new Product</Link>

        <div v-for="product in products" :key="product.id">
            <div class="flex justify-between gap-4 items-start mx-4 py-12">
                <div
                    class="flex bg-white rounded-lg shadow flex-col md:flex-row"
                >
                    <div
                        class="relative w-full md:w-48 flex justify-center items-center"
                    >
                        <img
                            :src="`storage/products/${product.image}`"
                            :alt="product.name"
                            class="object-cover w-full h-48 md:h-full rounded-t-lg md:rounded-l-lg md:rounded-t-none"
                        />
                    </div>
                    <div class="flex-auto p-6">
                        <div class="flex flex-wrap">
                            <h1 class="flex-auto text-xl font-semibold">
                                {{ product.name }}
                            </h1>
                            <div class="text-xl font-semibold text-gray-500">
                                {{ product.price === 0 ? "" : product.price }}
                            </div>
                            <div
                                class="flex-none w-full mt-2 text-sm font-medium text-gray-500"
                            >
                                {{ product.stock }} In stock
                            </div>
                        </div>
                        <div class="flex gap-2 mt-2 text-sm font-medium">
                            <Link
                                :href="route('show_product', product.id)"
                                class="py-2 px-4 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg"
                            >
                                Detail
                            </Link>
                            <Link
                                :href="route('delete_product', product)"
                                method="DELETE"
                                class="py-2 px-4 bg-red-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg"
                            >
                                Delete
                            </Link>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <product-card
                class="w-full"
                :id="product.id"
                :name="product.name"
                :image="product.image"
                :stock="product.stock"
            /> -->
        </div>
    </AppLayout>
</template>

<script>
import { Head, Link } from "@inertiajs/vue3";
import AppLayout from "../../Layouts/App.vue";
// import ProductCard from "../../components/ProductCard.vue";
// import { Inertia } from "@inertiajs/inertia";

export default {
    components: {
        AppLayout,
        Head,
        Link,
        // ProductCard,
    },
    props: {
        products: Object,
    },
    // setup() {
    //     const destroy = (id) => {
    //         if (confirm("Are you sure?")) {
    //             Inertia.get(route("delete_product", id));
    //         }
    //     };
    //     return {
    //         destroy,
    //     };
    // },
};
</script>
