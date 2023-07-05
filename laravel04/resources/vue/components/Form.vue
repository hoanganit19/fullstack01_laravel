<template>
    <select @change="choose">
        <option value="0">Chọn</option>
        <option value="1">Chọn 1</option>
        <option value="2">Chọn 2</option>
    </select>

    <h1 v-if="type === 1">Form thứ 1</h1>
    <h1 v-if="type === 2">Form thứ 2</h1>
</template>

<script>
export default {
    data() {
        return {
            type: 0,
        };
    },

    methods: {
        choose: function (e) {
            this.type = parseInt(e.target.value);
        },
    },
};
</script>
