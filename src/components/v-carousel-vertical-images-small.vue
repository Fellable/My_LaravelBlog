<template>
<div class="v-carousel-item">

    <img @click="$emit('setSlide', $attrs['index'])"  :src="image_data.url" class="item_slick_track" id="image" alt=""  />
        <div class="item__content">

        </div>
</div>

</template>

<style scoped>


.item_slick_track{
    display: block;
    width: 100%;
    margin: 0 0 20px 0;
    outline: none;
    border: 1px solid grey;
}
</style>

<script>


export default {
    name: "v-carousel-vertical-images-small",

    data: () => ({
            color: 'red',
            fontSize: '13px',
            height: 200,
            width: '200px'
    }),

    props: {


        image_data: {
            type: Object,
            default: () => {}
        },


    },

    emits: ['countSlide', 'setSlide'],

    methods: {

    },

    computed: {

    },

    mounted() {
        this.$emit('countSlide')
    }

}
</script>


