<script setup lang="ts">
import vueFilePond from 'vue-filepond'
import FilePondPluginImagePreview from 'filepond-plugin-image-preview'

import 'filepond/dist/filepond.min.css'
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css'

import { computed, ref } from 'vue'
import SideArrow from '@/Components/Icons/SideArrow.vue'

const props = defineProps<{
  task: Task
  phase: Phase
  project: Project
}>()

const emits = defineEmits<{
  (event: 'toggle'): void
}>()

const toggle = () => {
  emits('toggle')
}

const statuses = [
  { name: 'To do', color: 'rgb(239 68 68)' },
  { name: 'In progress', color: 'rgb(234 179 8)' },
  { name: 'Done', color: 'rgb(34 197 94)' },
]

const taskColor = computed(() => {
  return statuses[props.task.status].color
})

const taskStatus = computed(() => {
  return statuses[props.task.status].name
})

const createDate = new Date(props.task.created_at!).toLocaleDateString(
  'en-US',
  {
    year: 'numeric',
    month: 'short',
    day: 'numeric',
    hour: 'numeric',
    minute: 'numeric',
    hour12: true,
  }
)

const shortForm: Intl.DateTimeFormatOptions = {
  year: '2-digit',
  month: 'numeric',
  day: 'numeric',
}

const getShortForm = (date: string | Date) => {
  return new Date(date).toLocaleDateString('en-US', shortForm)
}

const startDate = getShortForm(props.task.start_date!)
const endDate = getShortForm(props.task.due_date!)
const currentDate = new Date()

const dueDateColor = computed(() => {
  if (new Date(props.task.due_date!) < currentDate) {
    return 'rgb(239 68 68)'
  }
  return '#777'
})

const filePond = vueFilePond(FilePondPluginImagePreview)
const pond = ref<HTMLDivElement | null>(null)
</script>

<template>
  <div class="task-backdrop" @click="toggle"></div>
  <div class="task-details-container">
    <div class="task-details-nav">
      <div class="task-details-breadcrumbs">
        <a href="#">{{ project.name }}</a>
        <span class="breadcrumbs-seperator">
          <SideArrow style="fill: #7c828d" />
        </span>
        <a href="#">Phase - {{ phase.name }} </a>
        <span class="breadcrumbs-seperator">
          <SideArrow style="fill: #7c828d" />
        </span>
        <a href="#">{{ task.title }}</a>
      </div>
      <div class="task-details-button details-close" @click="toggle">
        <svg viewBox="0 0 14 14">
          <path
            fill-rule="evenodd"
            d="M7 0a1 1 0 0 0-1 1v5H1a1 1 0 0 0 0 2h5v5a1 1 0 1 0 2 0V8h5a1 1 0 1 0 0-2H8V1a1 1 0 0 0-1-1z"
            clip-rule="evenodd"
          ></path>
        </svg>
      </div>
    </div>
    <div class="task-details-content">
      <div class="task-details-upper-contents">
        <div class="task-details-upper-content">
          <div class="task-status-button-changer" :style="{ color: taskColor }">
            <div class="task-status-button">{{ taskStatus }}</div>
            <div class="task-status-button-divider"></div>
            <div class="task-status-button button-arrow"></div>
          </div>
          <div v-if="taskStatus != 'Done'" class="mark-task-as-complete">
            <svg viewBox="0 0 12 10">
              <path fill="none" d="m1 5.37 3.01 2.96L11 1"></path>
            </svg>
          </div>
          <div class="task-details-assignee">E</div>
          <div class="task-details-priority">E</div>
        </div>
        <div class="task-details-upper-content">
          <div class="task-details-content-info">
            <div>
              <div class="content-info-title">Created</div>
              <div class="content-info-value">{{ createDate }}</div>
            </div>
          </div>
          <div class="content-info-divider"></div>
          <div class="task-details-content-info">
            <div>
              <div class="content-info-title">Start date</div>
              <div class="content-info-value">{{ startDate }}</div>
            </div>
          </div>
          <div class="content-info-divider"></div>
          <div class="task-details-content-info">
            <div>
              <div class="content-info-title">Due date</div>
              <div class="content-info-value" :style="{ color: dueDateColor }">
                {{ endDate }}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="task-details-lower-contents">
        <div class="task-details-content">
          <div class="task-details-tags">
            <div class="task-details-tags-content">
              <div class="task-details-tag" style="background-color: #f2f2f2">
                <div class="task-details-tag-name">Tag 1</div>
                <div class="task-details-tag-hover">
                  <div class="task-details-tag-options"></div>
                  <!-- <div class="task-details-tag-remove">
                      <svg viewBox="0 0 14 14">
                        <path
                          fill-rule="evenodd"
                          d="M7 0a1 1 0 0 0-1 1v5H1a1 1 0 0 0 0 2h5v5a1 1 0 1 0 2 0V8h5a1 1 0 1 0 0-2H8V1a1 1 0 0 0-1-1z"
                          clip-rule="evenodd"
                        ></path>
                      </svg>
                    </div> -->
                </div>
              </div>
              <div class="task-details-tag" style="background-color: #f2f2f2">
                <div class="task-details-tag-name">Tag 1</div>
                <div class="task-details-tag-hover">
                  <div class="task-details-tag-options"></div>
                  <!-- <div class="task-details-tag-remove">
                      <svg viewBox="0 0 14 14">
                        <path
                          fill-rule="evenodd"
                          d="M7 0a1 1 0 0 0-1 1v5H1a1 1 0 0 0 0 2h5v5a1 1 0 1 0 2 0V8h5a1 1 0 1 0 0-2H8V1a1 1 0 0 0-1-1z"
                          clip-rule="evenodd"
                        ></path>
                      </svg>
                    </div> -->
                </div>
              </div>
              <div class="task-details-tag" style="background-color: #f2f2f2">
                <div class="task-details-tag-name">Tag 1</div>
                <div class="task-details-tag-hover">
                  <div class="task-details-tag-options"></div>
                  <!-- <div class="task-details-tag-remove">
                      <svg viewBox="0 0 14 14">
                        <path
                          fill-rule="evenodd"
                          d="M7 0a1 1 0 0 0-1 1v5H1a1 1 0 0 0 0 2h5v5a1 1 0 1 0 2 0V8h5a1 1 0 1 0 0-2H8V1a1 1 0 0 0-1-1z"
                          clip-rule="evenodd"
                        ></path>
                      </svg>
                    </div> -->
                </div>
              </div>
              <div class="task-details-add-tag">
                <svg viewBox="0 0 23 20" xmlns="http://www.w3.org/2000/svg">
                  <g transform="translate(0 1)" fill="none" fill-rule="evenodd">
                    <path
                      d="M14.18 16.24l.68.61c.68.68 1.8.68 2.5-.03l4.41-4.4c.7-.7.71-1.83.03-2.51l-8.22-8.22a1.72 1.72 0 0 0-.77-.45L9.37.3a2.25 2.25 0 0 0-.8-.06c-.25.03-.5.1-.7.22a.87.87 0 0 0-.36.35"
                    ></path>
                    <path
                      d="M2.06 8.13c.03.11.09.22.18.3l9.16 9.17a.7.7 0 0 0 .99 0l5.95-5.95a.7.7 0 0 0 0-1L9.18 1.5a.7.7 0 0 0-.31-.19L4.56.15a.7.7 0 0 0-.68.18L1.06 3.14a.7.7 0 0 0-.18.68l1.17 4.3z"
                    ></path>
                    <circle cx="5.409" cy="4.668" r="1.403"></circle>
                  </g>
                </svg>
              </div>
            </div>
          </div>
          <div class="task-details-title">{{ task.title }}</div>
          <textarea class="task-details-description" cols="10"></textarea>
          <div class="task-details-sub-task">
            <div class="task-details-sub-task-title-header">
              <div class="task-details-sub-task-title">Subtasks</div>
              <div class="task-details-sub-task-title-options">
                <div class="sub-task-title-option">All</div>
                <div class="sub-task-title-option">Mine</div>
              </div>
            </div>
          </div>
          <div class="task-details-attachments">
            <div class="task-details-attachments-title-header">
              <div class="task-details-attachments-title">Attachments</div>
              <div class="task-details-attachments-add">Add</div>
            </div>
            <div class="task-details-attachments-content">
              <file-pond
                name="attachment"
                ref="pond"
                label-idle="Drop files here or <span class='filepond--label-action'>Browse</span>"
                :allow-remove="true"
                server="/uploads/process"
              />

              <table>
                <tr class="task-details-content-header">
                  <td></td>
                  <td>Name</td>
                  <td>Modified</td>
                  <td>By</td>
                </tr>
                <tr>
                  <td>Icon</td>
                  <td class="details-attachement-name-nd-size">
                    <span class="details-attachement-name">
                      Something Something.xd
                    </span>
                    <span class="details-attachement-size">10 KB</span>
                  </td>
                  <td class="details-attachement-time-nd-actions">
                    <div class="details-attachement-time">10 Mins ago</div>
                    <div class="details-attachement-actions">
                      <svg viewBox="0 0 9 9">
                        <path
                          fill="none"
                          d="M5.493.807 1.5 4.8.8 8.1l3.3-.8 3.908-3.993A1 1 0 0 0 8 1.9L6.907.807a1 1 0 0 0-1.414 0Z"
                        ></path>
                      </svg>
                      <svg viewBox="0 0 16 16">
                        <g
                          fill="none"
                          fill-rule="evenodd"
                          stroke-linecap="round"
                          stroke-width="2"
                        >
                          <path
                            d="M8 10V1.929M15 11v2a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-2"
                          ></path>
                          <path d="M11.5 7.5 8 11 4.5 7.5"></path>
                        </g>
                      </svg>
                      <svg viewBox="0 0 24 24">
                        <g
                          fill="none"
                          fill-rule="evenodd"
                          stroke-linecap="round"
                          stroke-width="2.5"
                        >
                          <path d="m2 2 20 20M22 2 2 22"></path>
                        </g>
                      </svg>
                    </div>
                  </td>
                  <td></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <div class="task-details-content"></div>
      </div>
    </div>
  </div>
</template>
