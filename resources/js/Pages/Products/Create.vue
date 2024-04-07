<template>
    <Head title="New Product" />
    <AppLayout>
        <div class="bg-white border-4 rounded-lg shadow relative m-10">
            <div
                class="flex items-start justify-between p-5 border-b rounded-t"
            >
                <h3 class="text-xl font-semibold">Add new Product</h3>
                <button
                    type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                    data-modal-toggle="product-modal"
                ></button>
            </div>

            <div class="p-6 space-y-6">
                <form @submit.prevent="form.post(route('store_product'))">
                    <div class="grid grid-cols-1 mb-5">
                        <div class="col-span-6 sm:col-span-3">
                            <label
                                for="name"
                                class="text-sm font-medium text-gray-900 block mb-2"
                                >Product Name</label
                            >
                            <input
                                type="text"
                                id="name"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="Product name"
                                v-model="form.name"
                            />
                            <div v-if="errors.name" class="text-red-600">
                                {{ errors.name }}
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label
                                for="stock"
                                class="text-sm font-medium text-gray-900 block mb-2"
                                >Stock</label
                            >
                            <input
                                type="text"
                                id="stock"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="Stock"
                                v-model="form.stock"
                            />
                            <div v-if="errors.stock" class="text-red-600">
                                {{ errors.stock }}
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label
                                for="price"
                                class="text-sm font-medium text-gray-900 block mb-2"
                                >Price</label
                            >
                            <input
                                type="number"
                                id="price"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                placeholder="Rp. xxx"
                                v-model="form.price"
                            />
                            <div v-if="errors.price" class="text-red-600">
                                {{ errors.price }}
                            </div>
                        </div>
                        <div class="col-span-full">
                            <label
                                for="description"
                                class="text-sm font-medium text-gray-900 block mb-2"
                                >Product Details</label
                            >
                            <textarea
                                id="description"
                                rows="6"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-4"
                                placeholder="Product details"
                                v-model="form.description"
                            ></textarea>
                            <div v-if="errors.description" class="text-red-600">
                                {{ errors.description }}
                            </div>
                        </div>
                        <div
                            class="col-span-full md:col-span-3 lg:col-span-2 mb-3"
                        >
                            <div class="mx-auto max-w-xs">
                                <label
                                    for="image"
                                    class="mb-1 block text-sm font-medium text-gray-700"
                                    >Product Image</label
                                >
                                <input
                                    id="image"
                                    type="file"
                                    class="mt-2 block w-full text-sm file:mr-4 file:rounded-md file:border-0 file:bg-teal-500 file:py-2 file:px-4 file:text-sm file:font-semibold file:text-white hover:file:bg-teal-700 focus:outline-none disabled:pointer-events-none disabled:opacity-60"
                                    @input="form.image = $event.target.files[0]"
                                />
                            </div>
                            <progress
                                v-if="form.progress"
                                :value="form.progress.percentage"
                                max="100"
                            >
                                {{ form.progress.percentage }}%
                            </progress>
                        </div>
                    </div>
                    <div
                        class="p-6 border-t border-gray-200 rounded-b text-center"
                    >
                        <button
                            type="submit"
                            class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                        >
                            Add product
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </AppLayout>
</template>

<script>
import { Head, useForm } from "@inertiajs/vue3";
import AppLayout from "../../Layouts/App.vue";

export default {
    components: {
        Head,
        AppLayout,
    },
    props: {
        errors: Object,
    },
    setup() {
        const form = useForm({
            name: "",
            stock: "",
            price: "",
            description: "",
            image: "",
        });

        return { form };
    },
};
</script>
