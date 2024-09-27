<template>
    {{ $attrs['image_data']['description'] }}
</template>
<script>

export default {
    name: "v-carousel-vertical-description",
    data() {
        return{
            number: 0,
        }
    },
    image_data: {
            type: Object,
            default: () => {}
        },
}
</script>


