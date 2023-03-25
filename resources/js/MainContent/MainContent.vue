<script setup lang="ts">
import ProjectContainer from "@/MainContent/Components/Project/ProjectContainer.vue";
import PhaseContainer from "@/MainContent/Components/Phase/PhaseContainer.vue";
import TaskList from "@/MainContent/Components/Task/TaskList.vue";
import TaskContainer from "@/MainContent/Components/Task/TaskContainer.vue";

const props = defineProps<{
    projects: Project[],
}>()

const groupTaskByStatus = (tasks: Task[]) => {
    return _.groupBy(tasks, (task: Task) => task.status);
}

</script>

<template>
    <div class="projects-container flex-grow-1">
        <ProjectContainer
            v-if="projects.length"
            v-for="project in projects"
            :key="project.id"
            :project="project"
        >
            <PhaseContainer
                v-if="project.phases.length"
                v-for="(phase, index) in project.phases"
                :key="phase.id"
                :phase="phase"
                :project="project"
                :index="index"
            >
                <TaskList
                    v-for="(task, index) in groupTaskByStatus(phase.tasks)"
                    :key="index"
                    :tasks="task"
                    :phase="phase"
                >
                    <TaskContainer :tasks="task" />
                </TaskList>
            </PhaseContainer>
        </ProjectContainer>
        <div v-else>
            <div class="flex flex-col items-center justify-center h-full">
                <div class="text-2xl font-bold text-gray-500">No projects yet</div>
                <div class="text-gray-500">Click the button below to add a project</div>
            </div>
        </div>
    </div>
</template>
