<script setup lang="ts">
import Modal from '@/Components/Modal.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';

import { ref, watch } from "vue";


const showPopup = ref(false);

const props = defineProps<{
    project: Project | null,
}>();

const emit = defineEmits<{
    (event: 'close'): () => void,
}>();


watch(() => props.project, (project) => {
    if (project) {
        showPopup.value = true;
    }
});

const closePopup = () => {
    emit('close');
    showPopup.value = false;
};


</script>

<template>
    <Modal :show="showPopup" @close="closePopup">
        <div class="p-6">

            <div class="mt-6">
                <div>
                    <InputLabel for="name" value="Project name" />

                    <TextInput
                        id="name"
                        class="mt-1 block w-full"
                        type="text"
                        placeholder="My project"
                        v-model="project.name"
                        :disabled="true"
                    />
                </div>

                <div class="mt-4">
                    <InputLabel for="description" value="Description" />

                    <TextInput
                        id="description"
                        class="mt-1 block w-full"
                        type="text"
                        placeholder="My project description"
                        v-model="project.description"
                        :disabled="true"
                    />
                </div>

                <div class="mt-4">
                    <InputLabel for="timeline" value="Timeline" />

                    <TextInput
                        id="timeline"
                        class="mt-1 block w-full"
                        type="date"
                        placeholder="My project timeline"
                        v-model="project.timeline"
                        :disabled="true"
                    />
                </div>

                <div class="mt-4">
                    <InputLabel for="budget" value="Budget" />

                    <TextInput
                        id="budget"
                        class="mt-1 block w-full"
                        type="number"
                        placeholder="My project budget"
                        v-model="project.budget"
                        :disabled="true"
                    />
                </div>

                <div class="mt-4">
                    <InputLabel for="resource_allocation" value="Resource allocation" />

                    <TextInput
                        id="resource_allocation"
                        class="mt-1 block w-full"
                        type="number"
                        placeholder="My project resource allocation"
                        v-model="project.resource_allocation"
                        :disabled="true"
                    />
                </div>
            </div>
            <div class="flex justify-end">
                <button @click="closePopup" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Close
                </button>
            </div>
        </div>

    </Modal>
</template>
