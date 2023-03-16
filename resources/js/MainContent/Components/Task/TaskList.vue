<script setup lang="ts">
import NewTask from "@/MainContent/Components/Task/NewTask.vue";

import { ref } from "vue";

const newTaskBtn = ref<HTMLButtonElement | null>(null);
const isNewTaskOpen = ref(false);

const showNewTask = (e: PointerEvent) => {
    if (e.target == newTaskBtn.value! && isNewTaskOpen.value) return;
    isNewTaskOpen.value = !isNewTaskOpen.value;
};

</script>

<template>
    <div class="side-arrow-dropdown">
        <div class="side-arrow-dropdown-header">
            <div class="arrow-dropdown-toggle arrow-dropdown-toggle--open" style="--default-color: blue">
                <div class="icon" style="width: 10px; height: 10px">
                    <svg viewBox="0 0 192 512">
                        <path d="M187.8 264.5 41 412.5c-4.7 4.7-12.3 4.7-17 0L4.2 392.7c-4.7-4.7-4.7-12.3 0-17L122.7 256 4.2 136.3c-4.7-4.7-4.7-12.3 0-17L24 99.5c4.7-4.7 12.3-4.7 17 0l146.8 148c4.7 4.7 4.7 12.3 0 17z"></path>
                    </svg>
                </div>
            </div>
            <div class="side-arrow-dropdown-header-task">
                <span class="task-status" style="--default-color: blue">in progress</span>
                <span class="task-number" style="--default-color: blue">3 tasks</span>
            </div>
            <div class="task-row-name">Assignee</div>
            <div class="task-row-name">Due date</div>
            <div class="task-row-name">Priority</div>
            <div class="task-row-name add-row">
                <div class="icon">
                    <svg viewBox="0 0 24 24">
                        <path clip-rule="evenodd" d="M12 4a8 8 0 1 0 0 16 8 8 0 0 0 0-16zM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12zm10-4.889a1 1 0 0 1 1 1V11h3.111a1 1 0 1 1 0 2H13v3.111a1 1 0 1 1-2 0V13H8.111a1 1 0 1 1 0-2H11V8.111a1 1 0 0 1 1-1z" fill-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
        </div>
        <div class="side-arrow-dropdown-content">
            <slot />
            <NewTask v-if="isNewTaskOpen" v-click-outside="showNewTask" @close="showNewTask"/>
            <button class="new-task-group" ref="newTaskBtn" @click="showNewTask">+ New task</button>
        </div>
    </div>
<!--    <slot />-->
</template>
