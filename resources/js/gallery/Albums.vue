<template>
    <div>
        <div v-if="loading" class="text-center">
            <Spinner />
        </div>
        <div v-if="albums.length" class="album-grid">
            <div v-for="album in albums" v-bind:key="album.id" class="album">
                <template v-if="album.preview_photos.length >= 4">
                    <a :href="`/backend/album/${album.id}/photos`" class="album-preview-multiple">
                        <img v-for="photoUrl in album.preview_photos" :src="photoUrl">
                    </a>
                </template>
                <template v-else>
                    <a :href="`/backend/album/${album.id}/photos`" class="album-preview">
                        <img :src="album.preview_photos[0]" alt="">
                    </a>
                </template>
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <a :href="`/backend/album/${album.id}/photos`" class="album-name">{{ album.name }}</a>
                        <div class="album-photos-count">{{ album.photos_count }} photos</div>
                    </div>
                    <div>
                        <button type="button" class="delete-album-btn" v-on:click="handleDelete(album)"><i
                                class="fa fa-trash-alt"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div v-else class="py-5 text-center">
            <h4>No Albums created yet!!</h4>
            <div>
                <a href="/backend/albums/create" class="btn btn-sm btn-primary"><i class="fa fa-plus mr-2"></i>नयाँ ग्यालेरी</a>
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
            axios.get(`/backend/albums/getAlbums`)
                .then((response) => {
                    this.albums = response.data.data;
                    this.loading = false;
                }).catch(error => console.log(error));
        },

        handleDelete(album) {
            Vue.swal({
                title: 'Delete Album',
                html: `Are you sure you want to delete:  <strong>${album.name}</strong>. It will also delete all photos within it.?`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(`/backend/albums/${album.id}`)
                        .then((response) => {
                            let index = this.albums.indexOf(album);
                            this.albums.splice(index, 1);
                        })
                        .error(error => console.log(error));
                }
            });
        }
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
    background-color: #f5f5f5;
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
    }

    .album-photos-count {
        font-size: .9rem;
        color: #333;
        font-family: Verdana, Geneva, Tahoma, sans-serif
    }
}

.delete-album-btn {
    border: none;
    width: 2rem;
    height: 2rem;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    color: rgb(220 38 38);
    background-color: rgba(220, 38, 38, 0.1);
    border-radius: 4px;

    &:hover {
        background-color: rgba(220, 38, 38, 0.2);
    }
}
</style>