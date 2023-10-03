<template>
  <div>
    <form v-on:submit.prevent="submit">
      <div class="form-group">
        <input type="text" v-model="form.receipt_no" class="form-control" placeholder="रसिद नम्बर" />
        <small class="text-danger">{{ form.errors.first("receipt_no") }}</small>
      </div>
      <div class="form-group">
        <input type="text" v-model="form.receipt_amount" class="form-control" placeholder="रकम" />
        <small class="text-danger">{{ form.errors.first("receipt_amount") }}</small>
      </div>
      <div class="text-right">
        <button class="btn btn-primary z-depth-0 ml-0 px-5 d-inline-flex align-items-center" :disabled="form.processing">
          <span v-show="form.processing" class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>
          <span>दर्ता गर्नुहोस्</span>
        </button>
      </div>
    </form>
  </div>
</template>

<script>
import Form from "form-backend-validation";

export default {
  props: {
    suchi: {
      required: true,
    },
  },

  data() {
    return {
      form: new Form(
        {
          _method: "patch",
          receipt_no: "",
          receipt_amount: "",
        },
        {
          resetOnSuccess: false,
        }
      ),
    };
  },

  methods: {
    submit() {
      this.form
        .patch(`/suchi/${this.suchi.hash_id}/register`)
        .then((response) => {
          this.$swal(response.message).then(() => {
            window.location.reload();
          });
        })
        .catch((error) => console.log(error));
    },
  },
};
</script>