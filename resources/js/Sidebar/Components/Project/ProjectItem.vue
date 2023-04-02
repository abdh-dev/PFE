<script setup lang="ts">
import ThreeVDots from '@/Components/Icons/ThreeVDots.vue'
import Plus from '@/Components/Icons/Plus.vue'
import PhaseItem from '@/Sidebar/Components/Phase/PhaseItem.vue'

import { Link } from '@inertiajs/vue3'
import { computed, Ref, ref } from 'vue'
import { useWebsocket } from '@/hooks/useWebsocket'

const props = defineProps<{
  project: Project
}>()

const emit = defineEmits<{
  (event: 'showPhase', project: Project): void
}>()

const project = ref<Project>(props.project) as Ref<Project>
const phases = ref<Phase[]>(project.value.phases ?? []) as Ref<Phase[]>
const openProject = ref(false)
const color = computed(() => project.value.color ?? '#7c828d')

const addPhase = (project: Project) => {
  emit('showPhase', project)
}

const height = computed(() => {
  let length = project.value.phases?.length ?? 0
  if (!length) length = 1

  return openProject.value ? length * 32 : 0
})

const phaseStore = (e: SocketEvent) => {
  console.log('PhaseCreated', e)
  phases.value.push(e.model)
  // if (!project.value.phases) project.value.phases = []
  // project.value.phases.push(e.model)
  // console.log(project.value.phases)
}

useWebsocket(`private.project.${project.value.id}.phases`, {
  '.PhaseCreated': phaseStore,
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
    <div class="project-phases" :style="{ height: height + 'px' }">
      <div class="project-phases-wrapper">
        <PhaseItem
          v-for="(phase, index) in project.phases"
          :key="phase.id"
          :phase="phase"
          :index="index"
        />
        <div v-if="!project.phases || project.phases?.length === 0">
          No phases yet
        </div>
      </div>
    </div>
  </div>
</template>
