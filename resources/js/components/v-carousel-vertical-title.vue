<template>
    {{ image_data['title'] }}
</template>


<script>
export default {
    name: "v-carousel-vertical-title",
    data() {
        return {
            number: 0,
        }
    },
    props: {
        image_data: {
            type: Object,
            default: () => {
            }
        }
    },
}
</script>


