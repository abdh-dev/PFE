<script setup lang="ts">
import SideArrow from '@/Components/Icons/SideArrow.vue'
import NewTask from '@/MainContent/Components/Task/NewTask.vue'
import TaskList from '@/MainContent/Components/Task/TaskList.vue'
import Tasks from '@/MainContent/Components/Task/Tasks.vue'

import { ref } from 'vue'

import { useWebsocket } from '@/hooks/useWebsocket'

const props = defineProps<{
  project: Project
  phase: Phase
  index: number
}>()

const project = ref<Project>(props.project)
const phase = ref<Phase>(props.phase)
const tasks = ref<Task[]>(phase.value.tasks ?? [])

const isOpened = ref(true)
const newTaskBtn = ref<HTMLButtonElement | null>(null)
const isNewTaskOpen = ref(false)

const showNewTask = (e: PointerEvent) => {
  // eslint-disable-next-line @typescript-eslint/no-non-null-assertion
  if (e?.target == newTaskBtn.value! && isNewTaskOpen.value) return
  isNewTaskOpen.value = !isNewTaskOpen.value
}

const groupTaskByStatus = (tasks: Task[]) => {
  return _.groupBy(tasks, (task: Task) => task.status)
}

useWebsocket(`private.phase.${phase.value.id}.tasks`, {
  '.TaskCreated': (e: SocketEvent) => {
    tasks.value.push(e.model)
  },
})
</script>

<template>
  <div
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
    <div class="side-arrow-dropdown-content">
      <NewTask
        v-if="isNewTaskOpen"
        v-click-outside="showNewTask"
        :phase="phase"
        @close="showNewTask"
      />

      <TaskList
        v-for="(task, i) in groupTaskByStatus(tasks)"
        :key="i"
        :tasks="task"
        :phase="phase"
      >
        <Tasks :tasks="task" :phase="phase" />
      </TaskList>
    </div>
  </div>
</template>
