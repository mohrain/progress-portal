<template>
  <div>
    <div class="main-wrap mt-4">
      <div class="content-root">
        <section class="box">
          <div class="box__body p-3">
            <vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions" :duplicateCheck="true"
              :includeStyling="true" :useCustomSlot="true" v-on:vdropzone-success="handleFileUploaded">
              <div class="dropzone-custom-content">
                <h3 class="dropzone-custom-title">Drag and drop an image file here</h3>
                <div class="subtitle">...or click to select a file from your computer</div>
              </div>
            </vue-dropzone>
          </div>
        </section>
        <div class="box mt-3">
          <div class="box__body">
            <section v-if="photos.length" class="gallery-grid">
              <div v-for="photo in photos" v-bind:key="photo.id" v-bind:class="{ 'photo-box': true, active: selectedPhoto && selectedPhoto.id == photo.id }"
                v-on:click="handlePhotSelected(photo.id)">
                <div class="photo">
                  <img :src="photo.url" :alt="photo.name">
                </div>
                <div class="photo-name">{{ photo.name }}</div>
              </div>
            </section>
            <section v-else class="text-center py-5">
              There are no photos in this Album yet !!
            </section>
          </div>
        </div>
      </div>
      <div v-if="selectedPhoto" class="detail-pane">
        <div class="box detail-pane-content">
          <div class="box__body">
            <img class="image-preview" :src="selectedPhoto.url" :alt="selectedPhoto.name">
            <h4 class="image-title">{{ selectedPhoto.name }}</h4>

            <button type="button" class="delete-image-btn" v-on:click="handleDelete()"><i
                class="fa fa-trash-alt mr-2"></i>Delete</button>

            <div class="information-item">
              <div class="info-label">Title</div>
              <div class="info-value">{{ selectedPhoto.name }}</div>
            </div>
            <div class="information-item">
              <div class="info-label">Size</div>
              <div class="info-value">{{ selectedPhoto.size.mb }}</div>
            </div>
            <div class="information-item">
              <div class="info-label">Format</div>
              <div class="info-value">{{ selectedPhoto.format }}</div>
            </div>
            <div class="information-item">
              <div class="info-label">Uploaded</div>
              <div class="info-value">{{ selectedPhoto.created_at.human }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'

export default {
  components: {
    vueDropzone: vue2Dropzone
  },
  props: {
    album: {
      default: () => ({}),
    }
  },
  data() {
    return {
      dropzoneOptions: {
        url: `/backend/album/${this.album.id}/photos`,
        thumbnailWidth: 150,
        maxFilesize: 2,
        headers: { "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content') },
        acceptedFiles: 'image/*'
      },
      photos: [],
      selectedPhoto: null
    };
  },

  mounted() {
    this.fetchPhotos()
  },

  methods: {
    fetchPhotos() {
      console.log('fetching photos');
      axios.get(`/backend/album/${this.album.id}/getPhotos`)
        .then(response => {
          console.log(response.data);
          this.photos = response.data.data
        })
        .catch(error => console.log(error));
    },
    handleFileUploaded(file, response) {
      this.photos.unshift(response);
      this.$refs.myVueDropzone.removeFile(file);
    },

    handlePhotSelected(id) {
      if (this.selectedPhoto?.id == id) {
        this.selectedPhoto = null
      } else {
        this.selectedPhoto = this.photos.find((photo) => photo.id == id)
      }
    },

    handleDelete() {
      Vue.swal({
        title: 'Delete Photo',
        html: `Are you sure you want to delete: <strong>${this.selectedPhoto.name}</strong>?`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          axios.delete(`/backend/photos/${this.selectedPhoto.id}`)
            .then((response) => {
              let index = this.photos.indexOf(this.selectedPhoto);
              this.photos.splice(index, 1);
              this.selectedPhoto = null;
            }
            )
            .error(error => console.log(error));
        }
      });
    }
  },
};
</script>

<style scoped lang="scss">
.main-wrap {
  display: flex;
  gap: 1rem;

  .content-root {
    flex-grow: 1;
  }

  .detail-pane {
    width: 200px;
    flex-shrink: 0;

    @media (min-width: 768px) {
      width: 250px;
    }

    @media (min-width: 992px) {
      width: 300px;
    }

  }
}

.vue-dropzone {
  border-radius: 6px;
  border-style: dashed;
  border-color: #00b782;

  .dz-message {
    display: flex;
    align-items: center;
    justify-content: center;
  }
}

.dropzone-custom-content {
  .dropzone-custom-title {
    margin-top: 0;
    color: #00b782;
  }

  .subtitle {
    color: #314b5f;
  }

}

.gallery-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 1rem;

  @media (min-width: 768px) {
    grid-template-columns: repeat(3, 1fr);
  }

  @media (min-width: 992px) {
    grid-template-columns: repeat(4, 1fr);
  }

  .photo-box {
    padding: .5rem;
    border: 1px solid #e5e5e5;
    border-radius: 4px;
    background-color: #fbfbfb;

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
      margin-top: .5rem;
      font-family: Arial, Helvetica, sans-serif;
      display: -webkit-box;
      -webkit-line-clamp: 1;
      -webkit-box-orient: vertical;
      overflow: hidden;
      word-break: break-all; // Very important other overflowing in x direction
    }
  }
}


.detail-pane-content {
  font-family: Arial, Helvetica, sans-serif;
  position: sticky;
  top: 1rem;

  .image-preview {
    border-radius: 4px;
    width: 100%;
    height: auto;
  }

  .image-title {
    font-size: 1.1rem;
    font-weight: 600;
    margin-top: 1rem;
    margin-bottom: 0;
    word-break: break-all;
  }

  .delete-image-btn {
    margin-top: 1rem;
    margin-bottom: 1rem;
    width: 100%;
    padding-top: .5rem;
    padding-bottom: .5rem;
    background-color: white;
    border: 1px solid rgb(255, 49, 49);
    color: rgb(255, 49, 49);
    border-radius: 4px;

    &:hover {
      background-color: rgba(255, 49, 49, 0.1);
    }
  }

  .information-item {
    margin-bottom: 1rem;

    .info-label {
      font-weight: 600;
    }
  }

}
</style>