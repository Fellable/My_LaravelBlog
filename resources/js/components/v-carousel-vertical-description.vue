<template>
    {{ $attrs.image_data.description }}
</template>

<script>
export default {
    name: 'v-carousel-vertical-description',
    image_data: {
        type: Object,
        default: () => {},
    },
    data() {
        return {
            number: 0,
        }
    },
}
</script>
