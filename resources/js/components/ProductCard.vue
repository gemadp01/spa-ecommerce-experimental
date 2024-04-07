<template>
    <div class="flex justify-between gap-4 items-start mx-4 py-12">
        <div class="flex bg-white rounded-lg shadow flex-col md:flex-row">
            <div
                class="relative w-full md:w-48 flex justify-center items-center"
            >
                <img
                    :src="`storage/${image}`"
                    :alt="name"
                    class="object-cover w-full h-48 md:h-full rounded-t-lg md:rounded-l-lg md:rounded-t-none"
                />
            </div>
            <form class="flex-auto p-6">
                <div class="flex flex-wrap">
                    <h1 class="flex-auto text-xl font-semibold">
                        {{ name }}
                    </h1>
                    <div class="text-xl font-semibold text-gray-500">
                        {{ price === 0 ? "" : price }}
                    </div>
                    <div
                        class="flex-none w-full mt-2 text-sm font-medium text-gray-500"
                    >
                        {{ stock }} In stock
                    </div>
                </div>
                <div class="flex gap-2 mt-2 text-sm font-medium">
                    <button
                        type="button"
                        class="py-2 px-4 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg"
                    >
                        Detail
                    </button>
                    <button
                        type="button"
                        @click="destroy(id)"
                        class="py-2 px-4 bg-red-600 hover:bg-red-700 focus:ring-red-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg"
                    >
                        Delete
                    </button>
                </div>
                <!-- <p class="text-sm text-gray-500 dark:text-gray-300">
                    Free shipping on all continental US orders.
                </p> -->
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: "product-card",
    props: {
        id: Number,
        name: String,
        description: {
            type: String,
            default: "",
        },
        price: {
            type: Number,
            default: 0,
        },
        stock: Number,
        image: String,
    },
};
</script>
