<template>
    <div class="v-carousel-main">
    <div class="wrapper-horizontal">
        <div class="v-carousel-horizontal" :style=" { 'margin-left': '-' + (images_margin_left*currentSlideIndex) + '%' }">
            <v-carousel-horizontal-images-small
                v-for="image in images"
                :key="image.id"
                :image_data="image"

            />
        </div>
    </div>


    </div>
    <button @click="prevSlide" style="margin-top: 5px; margin-right: 5px;
    border-radius: 3px;"> Назад </button>
    <button @click="nextSlide" style="margin-top: 5px;
    border-radius: 3px;"> Далее </button>
</template>

<style lang="scss">

@media screen and (min-width: 120px) {
    .wrapper-horizontal {
        height: 55px;
    }
    .v-carousel-main {
        width: 115px;
    }
}


@media screen and (min-width: 300px) {
    .wrapper-horizontal {
        height: 125px;
    }
    .v-carousel-main {
        width: 250px;
    }
}


@media screen and (min-width: 400px) {
    .wrapper-horizontal {
        height: 160px;
    }
    .v-carousel-main {
        width: 320px;
    }
}



@media screen and (min-width: 550px) {
    .wrapper-horizontal {
        height: 200px;
    }
    .v-carousel-main {
        width: 400px;
    }
}


@media screen and (min-width: 770px) {
    .wrapper-horizontal {
        height: 260px;
    }
    .v-carousel-main {
        width: 525px;
    }
}

@media screen and (min-width: 990px) {
    .wrapper-horizontal {
        height: 350px;
    }
    .v-carousel-main {
        width: 700px;
    }
}


@media screen and (min-width: 1200px) {
    .wrapper-horizontal {
        height: 425px;
    }

    .v-carousel-main {
        width: 850px;
    }
}

@media screen and (min-width: 1324px) {
    .wrapper-horizontal {
        height: 450px;
    }

    .v-carousel-main {
        width: 900px;
    }
}

@media screen and (min-width: 1400px) {
    .wrapper-horizontal {
        height: 450px;
    }

    .v-carousel-main {
        width: 900px;
    }
}

@media screen and (min-width: 1500px) {
    .wrapper-horizontal {
        height: 500px;
    }

    .v-carousel-main {
        width: 1000px;
    }
}


@media screen and (min-width: 1669px) {
    .wrapper-horizontal {
        height: 500px;
    }

    .v-carousel-main {
        width: 1000px;
    }
}


.v-carousel-main {
    margin-left: auto;
    margin-right: auto;
    text-align: center;
    margin-bottom: 0;
    order: 2;
    border: 1px solid red;
}


    .wrapper-horizontal {
        overflow: hidden;
        margin-left: auto;
        margin-right: auto;
        position: relative;
        transition: all ease .5s;
    }

    .v-carousel-horizontal {
        display: flex;
        transition: all ease .5s;
        margin-bottom: 15px;
    }






</style>
<script>
import vCarouselHorizontalImagesSmall from './v-carousel-horizontal-images-small.vue'


export default {
    name: "v-carousel-horizontal-main",
    components: {
        vCarouselHorizontalImagesSmall,

    },


    data() {
        return {
            currentSlideIndex: 0,
            interval: 2000,
            timer: null,
            currentTime: 5,
            images_margin_left: 0,
        }
    },
    props:['images', 'width'],

    mounted() {
        this.startTimer()
    },

    created() {
        this.init_margins()
    },


    destroyed() {
        this.stopTimer()
    },

    watch: {
        currentTime(time) {
            if (time === 0) {
                this.stopTimer()
            }
        },

        width(){
            this.init_margins()
        },
    },

    methods: {
        /**
         * В mounted запускается таймер методом startTimer().
         * Таймер запускается через setInterval с промежутком 3000 ms.
         * В момент уничтожения компонента, или когда отсчёт дойдет до нуля,
         * таймер нужно будет выключить, поэтому в методе destroyed помещаем stopTimer().
         * а в блоке watch отслеживаем текущее время, и если оно окажется равным нулю, то останавливаем.
         *
         */
        startTimer() {
            this.timer = setInterval(() => {
                this.nextSlide()
                this.currentTime--
            }, 3000)
        },

        stopTimer() {
            clearTimeout(this.timer)
        },


        reloadTimer() {
            clearTimeout(this.timer);
            this.startTimer()
        },

        prevSlide() {
            if (this.currentSlideIndex > 0)
                this.currentSlideIndex--
            this.reloadTimer();
        },

        nextSlide() {
            if (this.currentSlideIndex >= this.images.length - 1) {
                this.currentSlideIndex = 0
                this.reloadTimer();
            } else {
                this.currentSlideIndex++
                this.reloadTimer();
            }
        },

        init_margins() {
            if (this.width >= 1624) {
                this.images_margin_left = 100.25;
            } else if (this.width >= 1500) {
                this.images_margin_left = 100.25;
            } else if (this.width >= 1400) {
                this.images_margin_left = 100.25;
            } else if (this.width >= 1324) {
                this.images_margin_left = 100.25;
            } else if (this.width >= 1200) {
                this.images_margin_left = 100.25;
            } else if (this.width >= 990) {
                this.images_margin_left = 100.25;
            } else if (this.width >= 754) {
                this.images_margin_left = 100.5;
            } else if (this.width >= 550) {
                this.images_margin_left = 100.5;
            }else if (this.width >= 400) {
                this.images_margin_left = 100.75;
            }else if (this.width >= 300) {
                this.images_margin_left = 100.75;
            }else if (this.width >= 120) {
                this.images_margin_left = 101.5;
            }else {
            }
        }
    },


}
</script>



<style scoped>

</style>
