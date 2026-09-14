<template>
    {{ image_data.title }}
</template>

<script>
export default {
    name: 'v-carousel-vertical-title',
    props: {
        image_data: {
            type: Object,
            default: () => {},
        },
    },
    data() {
        return {
            number: 0,
        }
    },
}
</script>
