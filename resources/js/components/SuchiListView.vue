<template>
  <div class="box">
    <div class="box__body">
      <table class="table suchis-table">
        <thead>
          <tr>
            <th>क्र.स.</th>
            <th>{{ type == "registered" ? "दर्ता नं." : "टोकन नं." }}</th>
            <th>{{ type == "registered" ? "दर्ता मिति" : "आवेदन मिति" }}</th>
            <th>संस्था</th>
            <th>प्रकार</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="suchi in suchis.data" :key="suchi.hash_id">
            <td>{{ suchi.id }}</td>
            <td>
              <span class="project-register-no">{{ suchi.is_registered ? suchi.full_reg_no : suchi.token_no }}</span>
            </td>
            <td class="font-roboto">{{ suchi.is_registered ? suchi.reg_date : suchi.application_date }}</td>
            <td class="font-roboto">{{ suchi.name }}</td>
            <td class="font-roboto">{{ suchi.suchi_type }}</td>
            <td class="text-right">
              <a :href="`/suchi/${suchi.hash_id}`" class="btn btn-primary btn-md font-noto my-0 py-2 px-3 z-depth-0"><i class="fa fa-eye mr-2"></i>View</a>
            </td>
          </tr>
          <!-- <tr>
            <td colspan="10" class="text-center font-italic">डाटाबेसमा कुनै डाटा छैन |</td>
          </tr> -->
        </tbody>
      </table>
      <nav class="p-2 px-3 font-noto">
        <div class="d-flex justify-content-between align-items-center">
          <div>Showing {{ suchis.meta.from }} to {{ suchis.meta.from }} of {{ suchis.meta.total }} records</div>
          <div>
            <!-- {{ $suchis->links() }} -->
          </div>
        </div>
      </nav>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    suchis: {
      type: Object,
      required: true,
    },
    type: {
      type: String,
      required: false,
      default: "registered",
    },
  },

  data() {
    return {};
  },
};
</script>