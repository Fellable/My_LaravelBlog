<template>




    <div v-if="this.width < 770" >
        <v-carousel-horizontal-main
            :images = images
            :width = "width"
        />
    </div>

    <div v-else>
        <div v-if="this.images.length >=3">
            <v-carousel-vertical-main
                :images = images
                :width = "width"
            />
        </div>
        <div v-else-if="this.images.length >1">
            <v-carousel-horizontal-main
                :images = images
                :width = "width"
            />
        </div>
            <div v-else>
            Фоточек не будет (index1)
            </div>
    </div>
</template>

<script>
import VCarouselVerticalMain from "../../../src/components/v-carousel-vertical-main.vue";
import VCarouselHorizontalMain from "../../../src/components/v-carousel-horizontal-main.vue";



export default {

    /**
     *     <v-carousel-horisontal
     :images = images
     />

     *
     */
    name: "index",
    components: {
        VCarouselVerticalMain,
        VCarouselHorizontalMain,
    },

    data() {
        return {
            images: [],
            width: 0,
        }
    },

    mounted() {
        this.getScreens()
    },

    methods:{
        getScreens(id) {
            this.axios.get(`/api/post/${this.$route.params.id}`, {
                'images': this.images,
            })
                .then(res => {
                    this.images = res.data.data.images
                })
        },
        checkSize(){
            this.width = innerWidth
        },

        updateWidth() {
            this.width = window.innerWidth;
        },

    },

    created() {
        this.checkSize()
        window.addEventListener('resize', this.updateWidth);
    },


}
</script>

<style scoped>

</style>
