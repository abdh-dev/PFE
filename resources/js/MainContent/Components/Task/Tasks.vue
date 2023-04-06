<script setup lang="ts">
import ThreeVDots from '@/Components/Icons/ThreeVDots.vue'
import TaskFlag from '@/Components/Icons/TaskFlag.vue'
import NewTask from '@/MainContent/Components/Task/NewTask.vue'

import { computed, Ref, ref } from 'vue'
import { router } from '@inertiajs/vue3'

const props = defineProps<{
  task: Task
  phase: Phase
}>()

const statuses = [
  { name: 'To do', color: 'rgb(239 68 68)' },
  { name: 'In progress', color: 'rgb(234 179 8)' },
  { name: 'Done', color: 'rgb(34 197 94)' },
]

const taskColor = computed(() => {
  return statuses[props.task.status].color
})

const elementClass = computed(() => {
  return props.task.subtask_of ? 'sub-task-container' : 'task-container'
})

const newTaskBtn = ref<HTMLButtonElement | null>(null) as Ref<HTMLButtonElement>
const isNewTaskOpen = ref(false)

const showNewTask = (e: PointerEvent) => {
  if (e?.target == newTaskBtn.value) return
  isNewTaskOpen.value = !isNewTaskOpen.value
}

const deleteTask = (task: Task) => {
  router.delete(route('tasks.delete', { task: task.id ?? 0 }), {
    onSuccess: () => {
      console.log('true')
    },
    onError: () => {
      console.log('err')
    },
  })
}

console.log(props.task)
</script>

<template>
  <div :class="elementClass">
    <div class="task" :class="{ 'sub-task': task.subtask_of }">
      <div class="task-main-row">
        <!--            <TaskCaret />-->
        <div
          class="task-main-status"
          :style="{ '--default-color': taskColor }"
        />
        <div class="task-main-title">
          {{ task.title }}
        </div>
        <div class="task-options">
          <div ref="newTaskBtn" class="task-option" @click="showNewTask">
            <div class="icon">
              <svg style="fill: #7c828d" viewBox="0 0 16 16">
                <path
                  clip-rule="evenodd"
                  d="M2 3.5a2.5 2.5 0 1 1 3 2.45V9.5A2.5 2.5 0 0 0 7.5 12h2.55a2.5 2.5 0 1 1 0 1H7.5A3.5 3.5 0 0 1 4 9.5V5.95A2.5 2.5 0 0 1 2 3.5zM4.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm8 9a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm0-10a.5.5 0 0 1 .5.5V3h1.5a.5.5 0 0 1 0 1H13v1.5a.5.5 0 0 1-1 0V4h-1.5a.5.5 0 0 1 0-1H12V1.5a.5.5 0 0 1 .5-.5z"
                  fill-rule="evenodd"
                />
              </svg>
            </div>
          </div>
          <div class="task-option">
            <div class="icon">
              <svg
                style="stroke: #7c828d"
                viewBox="0 0 23 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <g fill="none" fill-rule="evenodd" transform="translate(0 1)">
                  <path
                    d="M14.18 16.24l.68.61c.68.68 1.8.68 2.5-.03l4.41-4.4c.7-.7.71-1.83.03-2.51l-8.22-8.22a1.72 1.72 0 0 0-.77-.45L9.37.3a2.25 2.25 0 0 0-.8-.06c-.25.03-.5.1-.7.22a.87.87 0 0 0-.36.35"
                  />
                  <path
                    d="M2.06 8.13c.03.11.09.22.18.3l9.16 9.17a.7.7 0 0 0 .99 0l5.95-5.95a.7.7 0 0 0 0-1L9.18 1.5a.7.7 0 0 0-.31-.19L4.56.15a.7.7 0 0 0-.68.18L1.06 3.14a.7.7 0 0 0-.18.68l1.17 4.3z"
                  />
                  <circle cx="5.409" cy="4.668" r="1.403" />
                </g>
              </svg>
            </div>
          </div>
          <div class="task-option">
            <div class="icon">
              <svg style="fill: #7c828d" viewBox="0 0 14 14">
                <path
                  clip-rule="evenodd"
                  d="M11.35 1.263a1.312 1.312 0 0 0-1.857 0l-1.05 1.05-.002.003-.002.001-7.436 7.436a.437.437 0 0 0-.128.31v2.624c0 .242.196.438.438.438h2.625a.437.437 0 0 0 .309-.128l7.436-7.436.001-.002.002-.001 1.05-1.051a1.312 1.312 0 0 0 0-1.856L11.35 1.263zm-9.6 8.98 7-7 2.006 2.007-7 7H1.75v-2.006zm7.619-7.618 2.006 2.006.743-.743a.438.438 0 0 0 0-.619l-1.387-1.387a.437.437 0 0 0-.62 0l-.742.743z"
                  fill-rule="evenodd"
                />
              </svg>
            </div>
          </div>
        </div>
      </div>
      <div class="task-row row-assignee">
        <div class="avatar-group -space-x-3">
          <div class="avatar">
            <div class="w-6">
              <img
                src="https://faces-img.xcdn.link/image-lorem-face-566.jpg"
                alt=""
              />
            </div>
          </div>
          <div class="avatar placeholder">
            <div class="w-6 bg-neutral-focus text-neutral-content">
              <span style="font-size: 12px">+1</span>
            </div>
          </div>
        </div>
      </div>
      <div class="task-row row-due-date date-over">
        {{ task.due_date }}
      </div>
      <div class="task-row row-priority" style="fill: red">
        <TaskFlag />
      </div>
      <div class="task-row option">
        <ThreeVDots @click="deleteTask(task)" />
      </div>
    </div>
    <Tasks
      v-for="subtask in task.subtasks"
      :key="subtask.id"
      :task="subtask"
      :phase="phase"
    />
    <NewTask
      v-if="isNewTaskOpen"
      v-click-outside="showNewTask"
      :phase="phase"
      :status="task.status"
      :subtask="task.id"
      @close="showNewTask"
    />
  </div>
</template>
