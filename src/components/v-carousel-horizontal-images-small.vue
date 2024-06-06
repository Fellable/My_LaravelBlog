<template>
<div class="v-carousel-item">

    <img :src="image_data.url" class="image" id="image" alt=""  />
        <div class="item__content">
         <!--   <p> {{ image_data.id }} </p> -->

        </div>
</div>

</template>

<style scoped>

@media screen and (min-width: 120px) {
    .image {
        width: 115px;
    }
}

@media screen and (min-width: 300px) {
    .image {
        width: 250px;
    }
}

@media screen and (min-width: 400px) {
    .image {
        width: 320px;
    }
}


@media screen and (min-width: 550px) {
    .image {
        width: 400px;
    }
}


@media screen and (min-width: 770px) {
    .image {
        width: 525px;
    }
}

@media screen and (min-width: 990px) {
    .image {
        width: 700px;
    }
}


@media screen and (min-width: 1200px) {
    .image {
        width: 850px;
    }
}

@media screen and (min-width: 1324px) {
    .image {
        width: 900px;
    }
}

@media screen and (min-width: 1400px) {
    .image {
        width: 900px;
    }
}

@media screen and (min-width: 1500px) {
    .image {
        width: 1000px;
    }
}


@media screen and (min-width: 1669px) {
    .image {
        width: 1000px;
    }
}




</style>

<script>


export default {
    name: "v-carousel-horizontal-images-small",

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


    methods: {

    },

    computed: {

    },


}
</script>


