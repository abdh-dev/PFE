<script setup lang="ts">
import PrimaryButton from '@/Components/PrimaryButton.vue'
import Modal from '@/Components/Modal.vue'
import SecondaryButton from '@/Components/SecondaryButton.vue'
import InputLabel from '@/Components/InputLabel.vue'
import TextInput from '@/Components/TextInput.vue'
import InputError from '@/Components/InputError.vue'
import ProjectPopup from '@/Pages/Project/ProjectPopup.vue'
import AppHead from '@/Components/AppHead.vue'
import TableLayout from '@/Layouts/TableLayout/TableLayout.vue'

import { ref, onMounted } from 'vue'
import { useForm } from '@inertiajs/vue3'

const form = useForm<Project>({
  name: '',
  description: '',
  timeline: '',
  budget: 0,
  resource_allocation: 0,
})

const props = defineProps<{
  projects: Project[]
}>()

const showModelEl = ref(false)
const showProjectPopup = ref(false)
const selectedProject = ref<Project | null>(null)

const showModal = () => {
  showModelEl.value = true
}

const closeModal = () => {
  showModelEl.value = false
}

const openProjectPopup = (project: Project) => {
  showProjectPopup.value = true
  selectedProject.value = project
}

const closeProjectPopup = () => {
  showProjectPopup.value = false
  selectedProject.value = null
  console.log('closeProjectPopup')
}

const submit = () => {
  form.post(route('projects.store'), {
    preserveScroll: true,
    onSuccess: () => closeModal(),
    onFinish: () => form.reset(),
  })
}

const deleteProject = (project: Project) => {
  form.delete(route('projects.destroy', project.id), {
    preserveScroll: true,
    onSuccess: () => closeModal(),
    onFinish: () => form.reset(),
  })
}

onMounted(() => {
  const projectChannel = Echo.channel('public.projects')

  projectChannel
    .listen('.project.created', (e: any) => {
      console.log('ProjectCreated', e)
      props.projects.push(e.project)
    })
    .listen('.project.updated', (e: any) => {
      console.log('ProjectUpdated', e)
      const updateIndex = props.projects.findIndex(
        (project) => project.id == e.project.id
      )
      if (updateIndex !== -1) {
        props.projects[updateIndex] = e.project
      }
    })
    .listen('.project.deleted', (e: any) => {
      console.log('ProjectDeleted', e)
      const deleteIndex = props.projects.findIndex(
        (project) => project.id == e.project.id
      )
      if (deleteIndex !== -1) {
        props.projects.splice(deleteIndex, 1)
      }
    })

  console.log('onMounted')
})
</script>

<template>
  <AppHead title="Temp Index" />
  <h1 class="text-2xl font-bold text-gray-900">Add projects</h1>
  <PrimaryButton @click="showModal">Add project</PrimaryButton>

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
              class="mt-1 block w-full"
              type="text"
              placeholder="My project"
              v-model="form.name"
            />

            <InputError :message="form.errors.name" class="mt-2" />
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

            <InputError :message="form.errors.description" class="mt-2" />
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

            <InputError :message="form.errors.timeline" class="mt-2" />
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

            <InputError :message="form.errors.budget" class="mt-2" />
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

  <h1 class="text-2xl font-bold text-gray-900">View projects</h1>
  <TableLayout
    :obj="projects"
    :action="['Edit', 'Delete']"
    @edit="openProjectPopup"
    @delete="deleteProject"
  />

  <ProjectPopup :project="selectedProject" @close="closeProjectPopup" />
</template>
