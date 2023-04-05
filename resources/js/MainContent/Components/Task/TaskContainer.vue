<!--<template>-->
<!--  <div class="side-arrow-dropdown-content">-->
<!--    <NewTask-->
<!--      v-if="isNewTaskOpen"-->
<!--      v-click-outside="showNewTask"-->
<!--      :phase="phase"-->
<!--      @close="showNewTask"-->
<!--    />-->

<!--    <TaskList-->
<!--      v-for="(task, i) in groupTaskByStatus(phase.tasks)"-->
<!--      :key="i"-->
<!--      :tasks="task"-->
<!--      :phase="phase"-->
<!--    >-->
<!--      <Tasks :tasks="task" :phase="phase" />-->
<!--    </TaskList>-->
<!--  </div>-->
<!--</template>-->
<!--<script setup lang="ts">-->
<!--import NewTask from '@/MainContent/Components/Task/NewTask.vue'-->
<!--import TaskList from '@/MainContent/Components/Task/TaskList.vue'-->
<!--import Tasks from '@/MainContent/Components/Task/Tasks.vue'-->
<!--</script>-->
