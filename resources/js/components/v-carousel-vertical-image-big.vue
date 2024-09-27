<template>
    <img :src="image_data.url" class="imageOne" id="image" alt="" >
</template>

<script>
export default {
    name: "v-carousel-vertical-image-big",
    props: {
        image_data: {
            type: Object,
            default: () => {}
        },
    },
}
</script>

<style lang="scss">
/**
Тоже ужасная портянка, стыдно за неё, но смысла переписывать нет.
*/
@media screen and (min-width: 754px) {
    .imageOne{
        height: 215px;
    }
}

@media screen and (min-width: 990px) {
    .imageOne{
        height: 300px;
    }
}

@media screen and (min-width: 1200px) {
    .imageOne{
        height: 390px;
    }
}


@media screen and (min-width: 1324px) {
    .imageOne{
        height: 420px;
    }
}

@media screen and (min-width: 1400px) {
    .imageOne{
        height: 510px;
    }
}


@media screen and (min-width: 1500px) {
    .imageOne{
        height: 510px;
    }
}

@media screen and (min-width: 1624px) {
    .imageOne{
        height: 510px;
    }
}


.imageOne{
    display:block;
}
</style>




