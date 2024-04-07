<template>
    <div class="bg-white border-4 rounded-lg shadow relative m-10">
        <div class="flex items-start justify-between p-5 border-b rounded-t">
            <h3 class="text-xl font-semibold">{{ title }}</h3>
            <button
                type="button"
                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                data-modal-toggle="product-modal"
            ></button>
        </div>

        <div class="p-6 space-y-6">
            <slot />
        </div>
    </div>
</template>

<script>
export default {
    props: ["title"],
};
</script>
