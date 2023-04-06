<script setup lang="ts">
import { computed } from 'vue'
import { prettyPrintJson } from 'pretty-print-json'

const props = defineProps<{
  json: never
}>()

const json = computed(() => {
  return prettyPrintJson.toHtml(props.json)
})
</script>

<template>
  <pre class="json-container" v-html="json"></pre>
</template>
