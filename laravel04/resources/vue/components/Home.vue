<script setup>
import Slide from "./Slide.vue";
const props = defineProps(["message"]);
// console.log(props.message)
</script>

<template>
    <Slide title="Slide 1" />
    <h1>Trang chủ Unicode: {{ count }}</h1>
    <button @click="increment(3)">+</button>
    <button @click="getProduct">Reload</button>

    <h2>Danh sách sản phẩm</h2>

    <h3 v-for="{ name } in products">{{ name }}</h3>
</template>

<script>
export default {
    data() {
        return {
            count: 1,
            products: [],
        };
    },
    methods: {
        increment: function (step) {
            this.count += step;
        },

        getProduct: async function () {
            const response = await fetch(`/api/products`);
            const data = await response.json();

            this.products = data;
        },
    },

    mounted() {
        this.getProduct();
    },
};
</script>
