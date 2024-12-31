<template>
    <div class="mt-4">
        <CoolLightBox
            :items="photos"
            :index="index"
            :fullscreen="true"
            @close="index = null"
        >
        </CoolLightBox>
        <div class="box mt-3">
            <div class="box__header">
                <h1 class="box__title">{{ album.name }}</h1>
                <p class="text-muted">{{ album.description }}</p>
            </div>
            <div class="box__body">
                <section v-if="photos.length" class="gallery-grid">
                    <div
                        v-for="(photo, index) in photos"
                        v-bind:key="photo.id"
                        v-bind:class="{
                            'photo-box': true,
                            active:
                                selectedPhoto && selectedPhoto.id == photo.id,
                        }"
                        v-on:click="handlePhotoClick(index)"
                    >
                        <div class="photo">
                            <img :src="photo.src" :alt="photo.name" /> 
                        </div>
                        <!-- <div class="photo-name">{{ photo.title }}</div> -->
                    </div>
                </section>
                <section v-else class="text-center py-5">
                    There are no photos in this Album yet !!
                </section>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import CoolLightBox from "vue-cool-lightbox";
import "vue-cool-lightbox/dist/vue-cool-lightbox.min.css";

export default {
    components: {
        CoolLightBox,
    },
    props: {
        album: {
            default: () => ({}),
        },
    },
    data() {
        return {
            photos: [],
            selectedPhoto: null,
            index: null,
        };
    },

    mounted() {
        this.fetchPhotos();
    },

    methods: {
        fetchPhotos() {
            console.log("fetching photos");
            axios
                .get(`/gallery/${this.album.id}/getPhotos`)
                .then((response) => {
                    console.log(response.data);
                    let data = response.data.data.map((photo) => {
                        return {
                            id: photo.id,
                            title: photo.name,
                            descirption: null,
                            src: photo.url,
                        };
                    });
                    this.photos = data;
                })
                .catch((error) => console.log(error));
        },

        handlePhotoClick(index) {
            this.index = index;
        },

        // handlePhotSelected(id) {
        //   if (this.selectedPhoto?.id == id) {
        //     this.selectedPhoto = null
        //   } else {
        //     this.selectedPhoto = this.photos.find((photo) => photo.id == id)
        //   }
        // },
    },
};
</script>

<style scoped lang="scss">
.gallery-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1rem;

    @media (max-width: 768px) {
        grid-template-columns: repeat(3, 1fr);
    }

    @media (min-width: 992px) {
        grid-template-columns: repeat(4, 1fr);
    }

    .photo-box {
        padding: 0.5rem;
        border-radius: 4px;
        border: 1px solid transparent;

        &:hover {
            border-color: #e5e5e5;
            background-color: #fbfbfb;
        }

        &.active {
            background-color: #e7e7e7;
            box-shadow: 0px 1px 4px 2px #c0c0c0;
        }

        .photo {
            aspect-ratio: 6/4;
            width: 100%;

            img {
                height: 100%;
                width: 100%;
                object-fit: cover;
                object-position: center;
                border-radius: 6px;
            }
        }

        .photo-name {
            margin-top: 0.5rem;
            font-family: Arial, Helvetica, sans-serif;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
            word-break: break-all; // Very important other overflowing in x direction
        }
    }
}
</style>
