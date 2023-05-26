<script setup lang="ts">
import SideArrow from '@/Components/Icons/SideArrow.vue'
import NewTask from '@/MainContent/Components/Task/NewTask.vue'
import TaskList from '@/MainContent/Components/Task/TaskList.vue'
import Tasks from '@/MainContent/Components/Task/Tasks.vue'
import TaskDetails from '@/MainContent/Components/Task/TaskDetails.vue'

import { computed, Ref, ref } from 'vue'
import PrettyJson from '@/Components/PrettyJson.vue'

const props = defineProps<{
  project: Project
  phase: Phase
  index: number
}>()

const isOpened = ref(true)
const newTaskBtn = ref<HTMLButtonElement | null>(null) as Ref<HTMLButtonElement>
const isNewTaskOpen = ref(false)
const detailsShown = ref(false)
const selectedTask = ref<Task | null>(null)
const selectedPhase = ref<Phase | null>(null)

const showNewTask = (e: PointerEvent) => {
  if (e?.target == newTaskBtn.value && isNewTaskOpen.value) return
  isNewTaskOpen.value = !isNewTaskOpen.value
}

const groupTaskByStatus = (tasks: Task[]) => {
  return _.groupBy(tasks, (task: Task) => task.status)
}

const groupSubTaskByParent = (tasks: Task[]) => {
  const parentTasks = tasks.filter((task) => task.subtask_of == null)
  const subTasks = tasks.filter((task) => task.subtask_of != null)
  const subTasksByParent = _.groupBy(subTasks, (task: Task) => task.subtask_of)

  return parentTasks.map((parentTask) => {
    return {
      ...parentTask,
      // eslint-disable-next-line @typescript-eslint/no-non-null-assertion
      subtasks: subTasksByParent[parentTask.id!],
    }
  })
}

const groupedTasks = computed(() => {
  // eslint-disable-next-line @typescript-eslint/no-non-null-assertion
  return groupSubTaskByParent(props.phase.tasks!)
})

const toggleTaskDetails = (e: PointerEvent, task: Task, phase: Phase) => {
  // console.log(e?.currentTarget, e?.target)
  console.log(e)

  if (detailsShown.value) {
    detailsShown.value = false
    selectedPhase.value = null
    selectedTask.value = null
    return
  }

  selectedPhase.value = phase
  selectedTask.value = task
  detailsShown.value = true
}
</script>

<template>
  <!--  <PrettyJson :json="groupTaskByStatus(groupedTasks)" />-->
  <!--  <PrettyJson :json="props.phase.tasks" />-->
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
        v-for="(tasks, i) in groupTaskByStatus(groupedTasks)"
        :key="i"
        :tasks="tasks"
        :phase="phase"
      >
        <Tasks
          v-for="task in tasks"
          :key="task.id"
          :task="task"
          :phase="phase"
          @toggleTaskDetails="toggleTaskDetails"
        />
        <!-- @click="(e: PointerEvent) => toggleTaskDetails(e, task, phase)" -->
      </TaskList>
    </div>
  </div>
  <TaskDetails
    v-if="detailsShown"
    :task="selectedTask"
    :phase="selectedPhase"
    :project="project"
    @toggle="toggleTaskDetails"
  />
</template>
