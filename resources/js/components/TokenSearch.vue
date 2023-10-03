<template>
  <div class="box">
    <div class="box__body">
      <form v-on:submit.prevent="search" class="form">
        <div class="form-group text-center">
          <h1 class="h1-responsive font-weight-bolder indigo-text font-noto">टोकन नम्बर</h1>
        </div>
        <div class="input-group mb-3">
          <input type="number" v-model="tokenNumber" class="form-control form-control-lg" autocomplete="off" required autofocus placeholder="आफ्नो टोकन नम्बर टाइप गर्नुहोस्" />
          <button class="search-btn" type="submit" data-mdb-ripple-color="dark">Search</button>
        </div>
      </form>

      <table v-if="suchi" class="table table-borderless table-responsive">
        <tr>
          <td>व्यवसायको नाम:</td>
          <td class="font-weight-bold">{{ suchi.name }}</td>
        </tr>
        <tr>
          <td>व्यवसायी नाम:</td>
          <td class="font-weight-bold">{{ suchi.contact_person }}</td>
        </tr>
        <tr>
          <td>टोकन नम्बर:</td>
          <td class="font-weight-bold">{{ suchi.token_no }}</td>
        </tr>
        <tr>
          <td colspan="2" class="text-center">
            <button type="button" class="btn btn-danger z-depth-0 btn-lg font-16px lang-english" v-on:click="clearSearch">Cancel</button>
            <a class="btn btn-success z-depth-0 btn-lg font-16px lang-english" :href="`/suchi-print-application/${suchi.hash_id}`">
              <span class="mr-3"><i class="fa fa-print"></i></span>
              <span>निवेदन छाप्नुहोस्</span>
            </a>
          </td>
        </tr>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      tokenNumber: "",
      suchi: null,
    };
  },

  methods: {
    search() {
      axios
        .get(`/api/suchi-by-token/${this.tokenNumber}`)
        .then((response) => {
          console.table(response.data.data);
          this.suchi = response.data.data;
        })
        .catch((error) => console.log(error));
    },

    clearSearch() {
      this.tokenNumber = "";
      this.suchi = null;
    },
  },
};
</script>

<style scoped>
.search-btn {
  color: #ffffff;
  background-color: #3f51b5;
  border: 2px solid #3f51b5;
  border-top-right-radius: 0.25rem;
  border-bottom-right-radius: 0.25rem;
  padding-left: 20px;
  padding-right: 20px;
  font-weight: 600;
  letter-spacing: 0.025rem;
}
.search-btn:hover{
    opacity: 0.9;
    outline: none;
}
.search-btn:focus{
    outline: none;
}
</style>