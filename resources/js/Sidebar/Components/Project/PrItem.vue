<script setup lang="ts">

import { ref, onMounted, watch } from 'vue';

const openProject = ref(false);
const props = defineProps<{
    // type: 'project' | 'everything'
}>()

const phases = ref<HTMLDivElement | null>(null)
const scrollHeight = ref(0);

onMounted(() => {
    watch(openProject, (val) => {
        if (val) {
            scrollHeight.value = phases.value!.scrollHeight;
        } else {
            scrollHeight.value = 0;
        }
    });
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
            <slot></slot>
            <div class="project-icons">
                <slot name="icons"></slot>
            </div>
        </div>
        <div class="project-phases" ref="phases" :style="{'height': scrollHeight + 'px'}">
            <div class="project-phases-wrapper">
                <slot name="phases"></slot>
            </div>
        </div>
    </div>
</template>
