<template>
  <div>
    <suchi-list-view :suchis="suchis"></suchi-list-view>
  </div>
</template>

<script>
import SuchiListView from "./SuchiListView.vue";

export default {
  components: { SuchiListView },
  data() {
    return {
      suchis: [],
    };
  },

  mounted() {
    this.loadSuchis();
  },

  methods: {
    loadSuchis() {
      axios
        .get(`/api/suchi`)
        .then((response) => {
          this.suchis = response.data;
        })
        .catch((error) => console.log(error));
    },
  },
};
</script>