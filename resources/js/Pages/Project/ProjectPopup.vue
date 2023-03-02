<script setup lang="ts">
import Modal from '@/Components/Modal.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue'

import { ref, watch } from "vue";
import { useForm } from "@inertiajs/vue3";

const showPopup = ref(false);

const props = defineProps<{
    project: Project | null,
}>();

let form = useForm<Project>({
    name: '',
    description: '',
    timeline: '',
    budget: 0,
    resource_allocation: 0,
});
const emit = defineEmits<{
    (event: 'close'): () => void,
}>();


watch(() => props.project, (project) => {
    if (project) {
        showPopup.value = true;
        form = useForm<Project>({
            name: project.name,
            description: project.description,
            timeline: project.timeline,
            budget: project.budget,
            resource_allocation: project.resource_allocation,
        });
    }
});

const closePopup = () => {
    form.reset();
    emit('close');
    showPopup.value = false;
};

const submit = () => {
    form.put(route('projects.update', props.project?.id), {
        preserveScroll: true,
        onSuccess: () => closePopup(),
        onFinish: () => form.reset(),
    });
};

</script>

<template>
    <Modal :show="showPopup" @close="closePopup">
        <div class="p-6">
            <form @submit.prevent="submit">
                <div>
                    <InputLabel for="name" value="Project name" />

                    <TextInput
                        id="name"
                        class="mt-1 block w-full"
                        type="text"
                        placeholder="My project"
                        v-model="form.name"
                    />
                </div>

                <div class="mt-4">
                    <InputLabel for="description" value="Description" />

                    <TextInput
                        id="description"
                        class="mt-1 block w-full"
                        type="text"
                        placeholder="My project description"
                        v-model="form.description"
                    />
                </div>

                <div class="mt-4">
                    <InputLabel for="timeline" value="Timeline" />

                    <TextInput
                        id="timeline"
                        class="mt-1 block w-full"
                        type="date"
                        placeholder="My project timeline"
                        v-model="form.timeline"
                    />
                </div>

                <div class="mt-4">
                    <InputLabel for="budget" value="Budget" />

                    <TextInput
                        id="budget"
                        class="mt-1 block w-full"
                        type="number"
                        placeholder="My project budget"
                        v-model="form.budget"
                    />
                </div>

                <div class="mt-4">
                    <InputLabel for="resource_allocation" value="Resource allocation" />

                    <TextInput
                        id="resource_allocation"
                        class="mt-1 block w-full"
                        type="number"
                        placeholder="My project resource allocation"
                        v-model="form.resource_allocation"
                    />
                </div>
                <div class="flex justify-end">
                    <button class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            @click="closePopup"

                    >
                        Close
                    </button>

                    <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Register
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </Modal>
</template>
