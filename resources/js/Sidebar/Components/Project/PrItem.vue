<script setup lang="ts">
import ThreeVDots from '@/Components/Icons/ThreeVDots.vue';
import PrName from '@/Sidebar/Components/Project/PrName.vue';
import Plus from '@/Components/Icons/Plus.vue';

import { Link } from '@inertiajs/vue3';
import { ref, computed } from 'vue';

const openProject = ref(false);
const props = defineProps<{
    project: Project
}>()

const emit = defineEmits<{
    (event: "showPhase", project: Project): void;
}>()

const emitAddPhase = (project: Project) => {
    emit("showPhase", project);
}

const height = computed(() => {
    let length = props.project.phases?.length ?? 0;
    if (!length) length = 1;

    return openProject.value ? length * 32 : 0;
})

</script>

<template>
    <div class="sidebar-project project-item" :class="{'project-open': openProject}">
        <div class="project-bar" @click.self="openProject = !openProject">
            <div class="project-caret">
                <svg viewBox="0 0 320 512">
                    <path d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"></path>
                </svg>
            </div>
            <PrName :project="project" />
            <div class="project-icons">
                <Link href="">
                    <ThreeVDots />
                </Link>
                <Plus @click="emitAddPhase(project)" />
            </div>
        </div>
        <div class="project-phases" :style="{'height': height + 'px'}">
            <div class="project-phases-wrapper">
                <slot></slot>
            </div>
        </div>
    </div>
</template>
