<script setup lang="ts">
import SideArrow from '@/Components/Icons/SideArrow.vue'
import TaskContainer from '@/MainContent/Components/Task/TaskContainer.vue'

import { ref } from 'vue'
import { useWebsocket } from '@/hooks/useWebsocket'

const props = defineProps<{
  project: Project
}>()

const project = ref<Project>(props.project)
const phases = ref<Phase[]>(props.project.phases ?? [])

const isOpened = ref(true)
const newTaskBtn = ref<HTMLButtonElement | null>(null)
const isNewTaskOpen = ref(false)

const showNewTask = (e: PointerEvent) => {
  // eslint-disable-next-line @typescript-eslint/no-non-null-assertion
  if (e?.target == newTaskBtn.value!) return
  isNewTaskOpen.value = !isNewTaskOpen.value
}

useWebsocket(`private.project.${project.value.id}.phases`, {
  '.PhaseCreated': (e: SocketEvent) => {
    phases.value.push(e.model)
  },
})
</script>

<template>
  <div
    v-for="(phase, index) in phases"
    :key="phase.id"
    class="phase-container flex-grow-1"
    :style="{
      '--phase-color': phase.color,
      '--background-color': 'rgba(46, 205, 111, 0.1)',
    }"
  >
    <div class="phase-project-title">{{ project.name }}</div>
    <div class="side-arrow-dropdown-header">
      <div
        class="arrow-dropdown-toggle"
        :class="{ 'arrow-dropdown-toggle--open': isOpened }"
        :style="{ '--default-color': project.color }"
        @click="isOpened = !isOpened"
      >
        <SideArrow />
      </div>
      <div class="side-arrow-dropdown-header-phase-title">
        Phase {{ index + 1 + ' - ' + phase.name }}
      </div>
      <button ref="newTaskBtn" class="new-task-group" @click="showNewTask">
        + New task
      </button>
    </div>
    <TaskContainer
      :phase="phase"
      :is-new-task-open="isNewTaskOpen"
      @show-task="showNewTask"
    />
  </div>
</template>
