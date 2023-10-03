<template>
  <div>
    <qrcode-vue :value="value" :size="size" level="Q" />
  </div>
</template>

<script>
import QrcodeVue from "qrcode.vue";

export default {
  components: {
    QrcodeVue,
  },
  props: {
    value: {
      type: String,
      required: true,
    },
    size: {
        type: Number,
        default: 200
    }
  },
};
</script>