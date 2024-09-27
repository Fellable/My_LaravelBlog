<template>
    <div style="display:flex; justify-content: space-between;">
        <div class="slick_track" style="border: none;">
        </div>
        <div class="right" style="border: none;">
            <v-carousel-vertical-title
                :image_data="images[currentSlideIndex]"
            />
        </div>
    </div>

    <div class="v-main-vertical">
        <div class="left">
            <div class="slick_list">
                <div class="slick_track">
                    <div class="item_slick_track">
                        <div class="wrapper-vertical">
                            <div class="target-vertical">
                            </div>
                            <div class="v-carousel-vertical" id="11"
                                 :style=" { 'margin-top': '-' + (small_images_margin_top*currentSlideIndex) + 'px' }">
                                <div class="small-vertical" v-for="num in 1">
                                    <v-carousel-vertical-images-small
                                        v-for="(image, index) in images"
                                        :key="image.id"
                                        :image_data="image"
                                        :index="index"
                                        @countSlide="countSlide"
                                        @setSlide="setSlide"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="pictures-big-vertical-main">
                <div class="pictures-big-vertical"
                     :style=" { 'margin-top': '-' + (big_image_margin_top * currentSlideIndex) + 'px' }">
                    <div v-for="num in 1">
                        <v-carousel-vertical-image-big
                            v-for="image in images"
                            :key="image.id"
                            :image_data="image"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="display:flex; justify-content: space-between;">
        <div class="slick_track" style="border: none;">
        </div>
        <div class="right" style="border: none;">
            <button @click="prevSlide" style="margin-top: 5px; margin-right: 5px;
    border-radius: 3px;"> Назад
            </button>
            <button @click="stopTimer" style="margin-top: 5px; margin-right: 5px;
    border-radius: 3px;"> Остановить слайдер
            </button>
            <button @click="nextSlide" style="margin-top: 5px;
    border-radius: 3px;"> Далее
            </button>
            <br>
            <v-carousel-vertical-description
                :image_data="images[currentSlideIndex]"
            />
        </div>
    </div>
</template>


<script>
import vCarouselVerticalImagesSmall from './v-carousel-vertical-images-small.vue'
import vCarouselVerticalImageBig from './v-carousel-vertical-image-big.vue'
import vCarouselVerticalTitle from './v-carousel-vertical-title.vue'
import VCarouselVerticalDescription from "./v-carousel-vertical-description.vue";

export default {
    name: "v-carousel-vertical-main",
    components: {
        VCarouselVerticalDescription,
        vCarouselVerticalImagesSmall,
        vCarouselVerticalImageBig,
        vCarouselVerticalTitle
    },
    data() {
        return {
            currentSlideIndex: 0,
            interval: 2000,
            timer: null,
            currentTime: 10,
            count_small: 0,

            big_image_margin_top: 0,
            small_images_margin_top: 0,
        }
    },
    props: ['images', 'width'],
    mounted() {
        this.startTimer()
        Object.keys(this.images).forEach((key) => {
        })
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
        width() {
            this.init_margins()
        },
    },

    methods: {
        // Видимо, мне было очень скучно когда я делал это. Оправдание одно - я был молод в 2020-м году )) Сейчас таким позором не занимаюсь
        init_margins() {
            if (this.width >= 1624) {
                this.big_image_margin_top = 510;
                this.small_images_margin_top = 129.5;
            } else if (this.width >= 1500) {
                this.big_image_margin_top = 510;
                this.small_images_margin_top = 129.5;
            } else if (this.width >= 1400) {
                this.big_image_margin_top = 510;
                this.small_images_margin_top = 129.5;
            } else if (this.width >= 1324) {
                this.big_image_margin_top = 420;
                this.small_images_margin_top = 129.5;
            } else if (this.width >= 1200) {
                this.big_image_margin_top = 390;
                this.small_images_margin_top = 116.75;
            } else if (this.width >= 990) {
                this.big_image_margin_top = 300;
                this.small_images_margin_top = 178.5;
            } else if (this.width >= 754) {
                this.big_image_margin_top = 215;
                this.small_images_margin_top = 116.5;
            } else {
                // заглушка
            }
        },
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
            if (this.currentSlideIndex >= this.count_small - 1) {
                this.currentSlideIndex = 0
                this.reloadTimer();
            } else {
                this.currentSlideIndex++
                this.reloadTimer();
            }
        },
        countSlide() {
            this.count_small++;
        },
        setSlide(id) {
            this.currentSlideIndex = id
            this.reloadTimer();
        }
    },
}
</script>

<style lang="scss">
/**
Тоже ужасная портянка, стыдно за неё, но смысла переписывать нет.
*/
@media screen and (min-width: 770px) {
    .slick_track {
        width: 255px;
    }
    .left {
        height: 215px !important;
    }

    .target-vertical {
        height: 98px;
        width: 193px;
    }

    .right {
        width: calc(100% - 265px);
    }

    .pictures-big-vertical-main {
        height: 215px;
    }

    .wrapper-vertical {
        max-width: 75%;
    }
}

@media screen and (min-width: 990px) {
    .slick_track {
        width: 315px;
    }
    .left {
        height: 300px !important;
    }

    .target-vertical {
        height: 160px;
        width: 316px;
    }

    .right {
        width: calc(100% - 335px);
    }

    .pictures-big-vertical-main {
        height: 300px;
    }

    .wrapper-vertical {
        max-width: 100%;
    }
}


@media screen and (min-width: 1200px) {
    .slick_track {
        width: 255px;
    }
    .left {
        height: 390px !important;
    }

    .target-vertical {
        height: 97px;
        width: 192px;
    }

    .right {
        width: calc(100% - 335px);
    }

    .pictures-big-vertical-main {
        height: 390px;
    }

    .wrapper-vertical {
        max-width: 75%;
    }
}

@media screen and (min-width: 1324px) {
    .slick_track {
        width: 255px;
    }
    .left {
        height: 420px !important;
    }

    .target-vertical {
        height: 110px;
        width: 216px;
    }

    .right {
        width: calc(100% - 275px);
    }

    .pictures-big-vertical-main {
        height: 420px;
    }

    .wrapper-vertical {
        max-width: 85%;
    }
}

@media screen and (min-width: 1400px) {
    .slick_track {
        width: 255px;
    }
    .left {
        height: 510px !important;
    }

    .target-vertical {
        height: 110px;
        width: 216px;
    }

    .right {
        width: calc(100% - 275px);
    }

    .pictures-big-vertical-main {
        height: 510px;
    }

    .wrapper-vertical {
        max-width: 85%;
    }
}

@media screen and (min-width: 1500px) {
    .slick_track {
        width: 255px;
    }
    .left {
        height: 510px !important;
    }

    .target-vertical {
        height: 110px;
        width: 216px;
    }

    .right {
        width: calc(100% - 275px);
    }

    .pictures-big-vertical-main {
        height: 510px;
    }

    .wrapper-vertical {
        max-width: 85%;
    }
}


@media screen and (min-width: 1669px) {
    .slick_track {
        width: 255px;
    }

    .left {
        overflow: hidden;
        height: 500px !important;
        border: 1px solid green;
    }
    .target-vertical {
        height: 110px;
        width: 217px;
    }

    .right {
        width: calc(100% - 275px);
    }

    .pictures-big-vertical-main {
        height: 500px;
    }
    .wrapper-vertical {
        // max-width: 85%;

    }
}


.wrapper-vertical {
    display: block;
    overflow: hidden;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 15px;
}

.v-carousel-vertical {
    display: block;
    transition: all ease .5s;
    margin-bottom: 15px;
}

.v-main-vertical {
    position: relative;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.left {
    overflow: hidden;

    border: 1px solid black;
}

.slick-list {
    position: relative;
    display: block;
    overflow: hidden;
    margin: 0;
    padding: 0;
}

.slick_track {
    display: block;
    opacity: 1;

    transform: translate3d(0px, 0px, 0px);

}

.target-vertical {
    position: absolute;
    display: block;
    outline: none;
    border: 2px solid greenyellow;
}


.right {
    position: relative;

    margin-bottom: 0;
    order: 2;
    border: 1px solid black;
}

.pictures-big-vertical-main {
    position: relative;
    overflow: hidden;
    transition: all ease .5s;
}

.pictures-big-vertical {
    transition: all ease .5s;
}

.smallVertical {
    display: block;
}

</style>

