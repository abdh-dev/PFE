<script setup lang="ts">
import { computed } from 'vue'

const props = defineProps<{
    border: boolean
}>()

const borderClass = computed(() => {
    return props.border ? 'bg-white border-b dark:bg-gray-800 dark:border-gray-700' : 'bg-white dark:bg-gray-800'
})

</script>

<template>
    <tr :class="borderClass">
        <slot />
    </tr>
</template>
