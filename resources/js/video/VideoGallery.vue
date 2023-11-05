<template>
    <div class="box">
        <div class="box__body">
            <div class="video-grid">
                <div v-for="video in videos" v-bind:key="video.id" class="video-item">
                    <div class="video-container">
                        <youtube :video-id="video.video_id" :player-vars="playerVars" width="100%" height="100%"></youtube>
                    </div>
                    <div class="video-title">
                        {{ video.title }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import VueYoutube from 'vue-youtube';

export default {
    components: { VueYoutube },
    props: {
        videos: {
            default: () => ({}),
        }
    },
    data() {
        return {
            playerVars: {
                autoplay: false,
            }
        }
    },
    methods: {
        playing() {
            console.log('\o/ we are watching!!!')
        }
    }
}

</script>

<style lang="scss" scoped>
.video-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 2rem;

    .video-item {
        padding: 8px;
        background-color: #f3f3f3;
        border-radius: 4px;

        .video-container {
            width: 100%;
            aspect-ratio: 16/9;

        }
        
        .video-title {
            font-weight: 600;
            padding: 8px;
        }
    }
}

@media (min-width: 768px) {
    .video-grid {
        grid-template-columns: 1fr 1fr;
    }
}

@media (min-width: 1024) {
    .video-grid {
        grid-template-columns: 1fr 1fr 1fr;
    }
}
</style>