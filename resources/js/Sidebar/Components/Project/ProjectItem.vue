<script setup lang="ts">
import ThreeVDots from '@/Components/Icons/ThreeVDots.vue'
import Plus from '@/Components/Icons/Plus.vue'

import { Link } from '@inertiajs/vue3'
import { computed, ref } from 'vue'

const props = defineProps<{
  project: Project
}>()

const emit = defineEmits<{
  (event: 'showPhase', project: Project): void
}>()

const openProject = ref(false)
const color = computed(() => props.project.color ?? '#7c828d')

const addPhase = (project: Project) => {
  emit('showPhase', project)
}

const height = computed(() => {
  let length = props.project.phases?.length ?? 0
  if (!length) length = 1

  return (openProject.value ? length * 32 : 0) + 'px'
})
</script>

<template>
  <div
    class="sidebar-project project-item"
    :class="{ 'project-open': openProject }"
  >
    <div class="project-bar" @click.self="openProject = !openProject">
      <div class="project-caret">
        <svg viewBox="0 0 320 512">
          <path
            d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"
          />
        </svg>
      </div>
      <div class="icon">
        <div :style="{ '--avatar-color': color }">
          {{ project.name[0] }}
        </div>
      </div>
      <div class="project-name">
        <Link href="#">{{ project.name }}</Link>
      </div>
      <div class="project-icons">
        <Link href="">
          <ThreeVDots />
        </Link>
        <Plus @click="addPhase(project)" />
      </div>
    </div>
    <div class="project-phases" :style="{ height: height }">
      <div class="project-phases-wrapper">
        <div
          v-for="(phase, index) in project.phases"
          :key="phase.id"
          class="project-phase"
        >
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

          <span class="phase-task-number">{{ phase.tasks?.length ?? 0 }}</span>
        </div>
        <div v-if="!project.phases || project.phases?.length === 0">
          No phases yet
        </div>
      </div>
    </div>
  </div>
</template>
