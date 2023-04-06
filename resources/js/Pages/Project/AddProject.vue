<script setup lang="ts">
import Modal from '@/Components/Modal.vue'
import InputLabel from '@/Components/InputLabel.vue'
import TextInput from '@/Components/TextInput.vue'
import InputError from '@/Components/InputError.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import SecondaryButton from '@/Components/SecondaryButton.vue'

import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'

const props = defineProps<{
  showModelEl: boolean
}>()

const showModelEl = ref(props.showModelEl)

const closeModal = () => {
  showModelEl.value = false
}

const form = useForm<Project>({
  name: '',
  description: '',
  timeline: '',
  budget: 0,
  resource_allocation: 0,
})

const submit = () => {
  form.post(route('projects.store'), {
    preserveScroll: true,
    onSuccess: () => closeModal(),
    onFinish: () => form.reset(),
  })
}
</script>

<template>
  <Modal :show="showModelEl" @close="closeModal">
    <div class="p-6">
      <h2 class="text-lg font-medium text-gray-900">Create a project</h2>

      <form @submit.prevent="submit">
        <p class="mt-1 text-sm text-gray-600">
          Please fill in the form below to create a new project.
        </p>

        <div class="mt-6">
          <div>
            <InputLabel for="name" value="Project name" />

            <TextInput
              id="name"
              v-model="form.name"
              class="mt-1 block w-full"
              type="text"
              placeholder="My project"
            />

            <InputError :message="form.errors.name" class="mt-2" />
          </div>

          <div class="mt-4">
            <InputLabel for="description" value="Description" />

            <TextInput
              id="description"
              v-model="form.description"
              class="mt-1 block w-full"
              type="text"
              placeholder="My project description"
            />

            <InputError :message="form.errors.description" class="mt-2" />
          </div>

          <div class="mt-4">
            <InputLabel for="timeline" value="Timeline" />

            <TextInput
              id="timeline"
              v-model="form.timeline"
              class="mt-1 block w-full"
              type="date"
              placeholder="My project timeline"
            />

            <InputError :message="form.errors.timeline" class="mt-2" />
          </div>

          <div class="mt-4">
            <InputLabel for="budget" value="Budget" />

            <TextInput
              id="budget"
              v-model="form.budget"
              class="mt-1 block w-full"
              type="number"
              placeholder="My project budget"
            />

            <InputError :message="form.errors.budget" class="mt-2" />
          </div>

          <div class="mt-4">
            <InputLabel for="resource_allocation" value="Resource allocation" />

            <TextInput
              id="resource_allocation"
              v-model="form.resource_allocation"
              class="mt-1 block w-full"
              type="number"
              placeholder="My project resource allocation"
            />

            <InputError
              :message="form.errors.resource_allocation"
              class="mt-2"
            />
          </div>
        </div>

        <div class="mt-6 flex justify-end">
          <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>

          <PrimaryButton
            class="ml-4"
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
          >
            Register
          </PrimaryButton>
        </div>
      </form>
    </div>
  </Modal>
</template>
