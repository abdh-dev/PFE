<script setup lang="ts">
import TaskList from '@/MainContent/Components/Task/TaskList.vue'
import Tasks from '@/MainContent/Components/Task/Tasks.vue'
import NewTask from '@/MainContent/Components/Task/NewTask.vue'
import { useWebsocket } from '@/hooks/useWebsocket'
import { ref } from 'vue'

const props = defineProps<{
  phase: Phase
  isNewTaskOpen: boolean
}>()

const emits = defineEmits<{
  (event: 'showTask'): void
}>()

const phase = ref<Phase>(props.phase)
const tasks = ref<Task[]>(phase.value.tasks ?? [])
const showNewTask = () => {
  emits('showTask')
}

const groupTaskByStatus = (tasks: Task[]) => {
  return _.groupBy(tasks, (task: Task) => task.status)
}

useWebsocket(`private.phase.${props.phase.id}.tasks`, {
  '.TaskCreated': (e: SocketEvent) => {
    tasks.value.push(e.model)
  },
})
</script>

<template>
  <div class="side-arrow-dropdown-content">
    <NewTask
      v-if="isNewTaskOpen"
      v-click-outside="showNewTask"
      :phase="phase"
      @close="showNewTask"
    />

    <TaskList
      v-for="(task, i) in groupTaskByStatus(phase.tasks)"
      :key="i"
      :tasks="task"
      :phase="phase"
    >
      <Tasks :tasks="task" :phase="phase" />
    </TaskList>
  </div>
</template>
