<script setup lang="ts">
import ThreeVDots from '@/Components/Icons/ThreeVDots.vue'

import { useWebsocket } from '@/hooks/useWebsocket'
import { Link } from '@inertiajs/vue3'
import { ref } from 'vue'

const props = defineProps<{
  phase: Phase
  index: number
}>()

const phase = ref<Phase>(props.phase)
const taskStore = (e: SocketEvent) => {
  console.log('TaskCreated', e)
  if (!phase.value.tasks_count) phase.value.tasks_count = 0
  phase.value.tasks_count++
}

useWebsocket(`private.phase.${props.phase.id}.tasks`, {
  '.TaskCreated': taskStore,
})
</script>

<template>
  <div class="project-phase">
    <div
      class="project-phase-circle"
      :style="{ '--circle-bg': phase.color ?? '' }"
    />
    <div class="project-phase-name">
      <Link href="#">Phase {{ index + 1 + ' - ' + phase.name }}</Link>
    </div>
    <div class="project-phase-icons">
      <ThreeVDots />
    </div>

    <span class="phase-task-number">{{ phase.tasks_count ?? 0 }}</span>
  </div>
</template>
