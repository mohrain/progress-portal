<template>
    <div>
        <div v-if="loading" class="text-center py-5">
            <Spinner />
        </div>
        <div v-if="albums.length" class="album-grid">
            <div v-for="album in albums" v-bind:key="album.id" class="album">
                <template v-if="album.preview_photos.length >= 4">
                    <a :href="`/gallery/${album.id}/photos`" class="album-preview-multiple">
                        <img v-for="photoUrl in album.preview_photos" :src="photoUrl">
                    </a>
                </template>
                <template v-else>
                    <a :href="`/gallery/${album.id}/photos`" class="album-preview">
                        <img :src="album.preview_photos[0]" alt="">
                    </a>
                </template>
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <a :href="`/gallery/${album.id}/photos`" class="album-name">{{ album.name }}</a>
                        <div class="album-photos-count">{{ album.photos_count }} photos</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Spinner from "../components/Spinner.vue";

export default {
    components: { Spinner },
    data() {
        return {
            albums: [],
            loading: false
        }
    },
    mounted() {
        this.fetchAlbums();
    },

    methods: {
        fetchAlbums() {
            this.loading = true;
            axios.get(`/gallery/getAlbums`)
                .then((response) => {
                    this.albums = response.data.data;
                    this.loading = false;
                }).catch(error => console.log(error));
        },
    }
}
</script>

<style scoped lang="scss">
.album-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
}

.album {
    padding: .5rem;
    // background-color: #f5f5f5;
    border-radius: 4px;

    .album-preview {
        display: block;
        width: 100%;
        aspect-ratio: 6/4;

        img {
            width: 100%;
            height: 100%;
            border-radius: 5px;
            object-fit: cover;
            object-position: center;
        }
    }

    .album-preview-multiple {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 5px;
        width: 100%;
        aspect-ratio: 6/4;
        border-radius: 5px;
        overflow: hidden;

        img {
            border-radius: 5px;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }
    }

    .album-name {
        display: block;
        margin-top: .5rem;
        font-size: 1.1rem;
        color: initial;
        font-weight: 500;
        color: #282837;
    }

    &:hover .album-name {
        text-decoration: underline;
    }

    .album-photos-count {
        font-size: .9rem;
        color: #615f5f;
        font-family: Verdana, Geneva, Tahoma, sans-serif
    }
}
</style>