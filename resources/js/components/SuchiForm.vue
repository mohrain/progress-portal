  <template>
  <div class="box">
    <div class="box__header">
      <div class="box__title">नयाँ सूची दर्ता</div>
    </div>
    <div class="box__body">
      <div v-if="guestMode" class="mb-4">
        यस पालिका र अन्तर्गतका वडा कार्यालयमा पहिल्यै दर्ता भईसकेका व्यवसाय सङ्गँ मिल्दो नाम दर्ता हुने छैन । Space, ह्र्स्व र दिर्घका आधारमा System ले नाम दिएमा यसलाई पालिकाले अस्विकृत गर्न सक्नेछ ।
      </div>

      <form @submit.prevent="submit" method="POST">
        <div class="row">
          <div class="col-md-12">
            <div v-if="!guestMode" class="reg-bar">
              <div class="row">
                <div class="form-group col-md-6">
                  <label class="required">दर्ता नम्बर</label>
                  <input type="text" :value="suchi.full_reg_no" class="form-control" disabled />
                </div>

                <div class="form-group col-md-6">
                  <label class="required">दर्ता मिति</label>
                  <v-nepalidatepicker v-if="updateMode && suchi.reg_date" v-model="form.reg_date" calenderType="Nepali" classValue="form-control" :placeholder="form.reg_date"></v-nepalidatepicker>
                  <input v-else type="text" v-bind:value="form.reg_date" class="form-control" disabled />
                  <small class="text-danger">{{ form.errors.first("reg_date") }}</small>
                </div>

                <div class="form-group col-md-6">
                  <label class="required">रसिद नम्बर</label>
                  <input type="text" v-model="form.receipt_no" class="form-control" placeholder="रसिद नम्बर" />
                  <small class="text-danger">{{ form.errors.first("receipt_no") }}</small>
                </div>

                <div class="form-group col-md-6">
                  <label class="required">रकम</label>
                  <input type="text" v-model="form.receipt_amount" class="form-control" placeholder="रकम" />
                  <small class="text-danger">{{ form.errors.first("receipt_amount") }}</small>
                </div>

              </div>
            </div>
          </div>

          <div class="col-md-12 pb-3 font-weight-bold">१. मौजुदा सूचीको लागि निवेदन दिने व्यक्ति, फर्म, संस्था, आपूर्तिकर्ता, निर्माण व्यवसायी,परामर्शदाता वा सेवा प्रदायकको विवरण :</div>

          <div class="form-group col-md-6">
            <label class="required">संस्थाकाे नाम</label>
            <input type="text" v-model="form.name" class="form-control" />
            <small class="text-danger">{{ form.errors.first("name") }}</small>
          </div>

          <div class="form-group col-md-6">
            <label class="required">ठेगाना</label>
            <input type="text" v-model="form.address" class="form-control" />
            <small class="text-danger">{{ form.errors.first("address") }}</small>
          </div>

          <div class="form-group col-md-6">
            <label class="required">सम्पर्क व्यक्ति</label>
            <input type="text" v-model="form.contact_person" class="form-control" />
            <small class="text-danger">{{ form.errors.first("contact_person") }}</small>
          </div>

          <div class="form-group col-md-6">
            <label class="required">फोन नं.</label>
            <input type="text" v-model="form.contact" class="form-control" />
            <small class="text-danger">{{ form.errors.first("contact") }}</small>
          </div>

          <div class="form-group col-md-6">
            <label class="required">माेबाइल नंं.</label>
            <input type="text" v-model="form.mobile" class="form-control" />
            <small class="text-danger">{{ form.errors.first("mobile") }}</small>
          </div>

          <div class="form-group col-md-6">
            <label>इमेल</label>
            <input type="text" v-model="form.email" class="form-control" />
            <small class="text-danger">{{ form.errors.first("email") }}</small>
          </div>

          <div class="col-md-12 pb-3 font-weight-bold">२. मौजुदा सूचीमा दर्ता हुनको लागि निम्न बमोजिमको प्रमाणपत्र संलग्न गर्नु होला ।</div>

          <div class="form-group col-md-6">
            <label>संस्था वा फर्म दर्ताको प्रमाणपत्र (Optional)</label>
            <div class="custom-file">
              <input type="file" v-on:change="handleFileUpload($event, 'reg_cert')" class="custom-file-input" id="reg_cert" />
              <label class="custom-file-label" for="reg_cert">Choose file</label>
            </div>
            <small class="text-danger">{{ form.errors.first("reg_cert") }}</small>
          </div>

          <div class="form-group col-md-6">
            <label>नविकरण गरेको प्रमाण-पत्र (Optional)</label>
            <div class="custom-file">
              <input type="file" v-on:change="handleFileUpload($event, 'renew_cert')" class="custom-file-input" id="renew_cert" />
              <label class="custom-file-label" for="renew_cert">Choose file</label>
            </div>
            <small class="text-danger">{{ form.errors.first("renew_cert") }}</small>
          </div>

          <div class="form-group col-md-6">
            <label>मूल्य अभिबृद्धि कर वा स्थायी लेखा नम्बर दर्ताको प्रमाण-पत्र (Optional)</label>
            <div class="custom-file">
              <input type="file" v-on:change="handleFileUpload($event, 'pan_cert')" class="custom-file-input" id="pan_cert" />
              <label class="custom-file-label" for="pan_cert">Choose file</label>
            </div>
            <small class="text-danger">{{ form.errors.first("pan_cert") }}</small>
          </div>

          <div class="form-group col-md-6">
            <label>कर चुक्ताको प्रमाण-पत्र (Optional)</label>
            <div class="custom-file">
              <input type="file" v-on:change="handleFileUpload($event, 'tax_cert')" class="custom-file-input" id="tax_cert" />
              <label class="custom-file-label" for="tax_cert">Choose file</label>
            </div>
            <small class="text-danger">{{ form.errors.first("tax_cert") }}</small>
          </div>

          <div class="form-group col-md-6">
            <label>कुन खरिदको लागि मौजुदा सूचिमा दर्ता हुन निवेदन दिने हो , सो कामको लागि इजाजतपत्र आवश्यक पर्ने भएमा सो को प्रतिलिपी (Optional)</label>
            <div class="custom-file">
              <input type="file" v-on:change="handleFileUpload($event, 'license_cert')" class="custom-file-input" id="license_cert" />
              <label class="custom-file-label" for="license_cert">Choose file</label>
            </div>
            <small class="text-danger">{{ form.errors.first("license_cert") }}</small>
          </div>

          <div class="form-group col-md-6">
            <label>भुक्तानी गरेको रसिद वा बैंक भाैचर (Optional)</label>
            <div class="custom-file">
              <input type="file" v-on:change="handleFileUpload($event, 'receipt')" class="custom-file-input" id="receipt" />
              <label class="custom-file-label" for="receipt">Choose file</label>
            </div>
            <small class="text-danger">{{ form.errors.first("receipt") }}</small>
          </div>

          <div class="col-md-12 pb-3 font-weight-bold">३. सार्वजनिक निकायबाट हुने खरिदको लागि दर्ता हुन चाहेको खरिदको प्रकृतीको विवरण :</div>

          <div class="form-group col-md-6">
            <label class="required">संस्थाकाे प्रकार</label>
            <select class="custom-select" v-model="form.suchi_type_id">
              <option value="">संस्थाकाे प्रकार चयन गर्नुहोस्</option>
              <option v-for="type in suchiTypes" :value="type.id" v-bind:key="type.id">{{ type.title }}</option>
            </select>
            <small class="text-danger">{{ form.errors.first("suchi_type_id") }}</small>
          </div>

          <div class="form-group col-md-6">
            <label class="required">कारोबार गर्ने वस्तु</label>
            <input type="text" v-model="form.product_type" class="form-control" />
            <small class="text-danger">{{ form.errors.first("product_type") }}</small>
          </div>

          <!-- <div class="form-group col-lg-12">
            <label>विवरण</label>
            <vue-editor v-model="form.description"></vue-editor>
            <small class="text-danger">{{ form.errors.first("description") }}</small>
          </div> -->
        </div>
        <div class="text-right">
          <button class="btn btn-primary z-depth-0 ml-0 px-5 d-inline-flex align-items-center" :disabled="form.processing">
            <span v-show="form.processing" class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>
            <span>पेश गर्नुहोस्</span>
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import Form from "form-backend-validation";
import { VueEditor } from "vue2-quill-editor";
import VNepaliDatePicker from "v-nepalidatepicker";

export default {
  components: {
    VueEditor,
    VNepaliDatePicker,
  },

  props: {
    suchi: {
      default: () => ({}),
    },
    suchiTypes: {
      default: () => {},
      type: Array,
    },
    guestMode: {
      type: Boolean,
      default: true,
    },
  },

  data() {
    return {
      updateMode: false,
      form: new Form(
        {
          reg_date: "",
          name: "",
          address: "",
          contact_person: "",
          contact: "",
          email: "",
          mobile: "",
          suchi_type_id: "",
          product_type: "",

          receipt_no: '',
          receipt_amount: '',

          reg_cert: "",
          renew_cert: "",
          pan_cert: "",
          tax_cert: "",
          license_cert: "",
          receipt: "",
        },
        {
          resetOnSuccess: false,
        }
      ),
    };
  },
  mounted() {
    this.form.reg_date = this.suchi.reg_date;
    if (this.suchi.id) {
      this.updateMode = true;
      // this.form.reg_no = this.suchi.reg_no;
      this.form.name = this.suchi.name;
      this.form.address = this.suchi.address;
      this.form.contact_person = this.suchi.contact_person;
      this.form.contact = this.suchi.contact;
      this.form.email = this.suchi.email;
      this.form.mobile = this.suchi.mobile;
      this.form.suchi_type_id = this.suchi.suchi_type_id;
      this.form.product_type = this.suchi.product_type;
      this.form.receipt_no = this.suchi.receipt_no;
      this.form.receipt_amount = this.suchi.receipt_amount;
    }
  },

  methods: {
    submit() {
      this.updateMode ? this.update() : this.create();
    },

    create() {
      this.form.post("/suchi").then((response) => {
        if (this.guestMode) {
          window.location.href = `/application-submitted/${response.hash_id}`;
        } else {
          this.$swal(response.message).then(() => (window.location.href = `/suchi/${response.hash_id}`));
        }
      });
    },

    update() {
      this.form.post(`/suchi/${this.suchi.hash_id}/update`).then((response) => {
        this.$swal(response.message).then(() => (window.location.href = `/suchi/${this.suchi.hash_id}`));
      });
    },

    handleFileUpload(event, field) {
      this.form[field] = event.target.files[0];
    },
  },
};
</script>

<style scoped>
.required::after {
  content: " *";
  color: red;
  vertical-align: super;
}

.reg-bar {
  background-color: #f9fcff;
  padding: 10px;
  margin-bottom: 1rem;
  border-radius: 0.05rem;
  border: 1px solid #f0f7fe;
}
</style>