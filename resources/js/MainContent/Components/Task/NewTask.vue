<script setup lang="ts">

import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import Modal from "@/Components/Modal.vue";

// const props = defineProps<{
//     phase: Phase
// }>()

const emit = defineEmits<{
    (event: "close"): void
}>()

const input = ref<HTMLInputElement | null>(null)
const error = ref<boolean>(true)

const close = () => {
    input.value!.value = ""
    emit("close")
}

const today = new Date().toISOString().slice(0, 10)
const tomorrow = new Date(new Date().getTime() + 24 * 60 * 60 * 1000).toISOString().slice(0, 10)

const form = useForm<Task>({
    title: "",
    status: 0,
    priority: 0,
    start_date: today,
    due_date: tomorrow,
    completion_date: "",
    custom_fields: [],
})

const submit = () => {
    form.post(route("tasks.store", { "phase_id": 1 }), {
        onSuccess: () => {
            close()
            console.log("success")
        },
        onError: () => {
            error.value = true
            console.log(form.errors)
        },
    })
}

</script>

<template>
    <div class="task-container">
        <form class="new-task" @submit.prevent="submit">
            <div class="task-main-row">
                <div class="task-main-status" style="--default-color: blue"></div>
                <input class="input-task-name" v-model="form.title" ref="input" placeholder="Task name" type="text" />
            </div>
            <div class="new-task-item">
                <div class="icon stroke-border-icon">
                    <svg fill="black" stroke="none" viewBox="0 0 34 34">
                        <path clip-rule="evenodd" d="M15 17v-3.468l9.704-9.704 3.468 3.468L18.468 17H15zm-2-3.468V17a2 2 0 0 0 2 2h3.468a2 2 0 0 0 1.414-.586l9.704-9.703a2 2 0 0 0 0-2.829l-3.468-3.468a2 2 0 0 0-2.828 0l-9.704 9.704A2 2 0 0 0 13 13.532zM6 6h8v2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-8h2v8a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V10a4 4 0 0 1 4-4z" fill-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
            <div class="new-task-item">
                <div class="icon stroke-border-icon">
                    <svg viewBox="0 0 23 20">
                        <g fill="none" fill-rule="evenodd" transform="translate(0 1)">
                            <path d="M14.18 16.24l.68.61c.68.68 1.8.68 2.5-.03l4.41-4.4c.7-.7.71-1.83.03-2.51l-8.22-8.22a1.72 1.72 0 0 0-.77-.45L9.37.3a2.25 2.25 0 0 0-.8-.06c-.25.03-.5.1-.7.22a.87.87 0 0 0-.36.35"></path>
                            <path d="M2.06 8.13c.03.11.09.22.18.3l9.16 9.17a.7.7 0 0 0 .99 0l5.95-5.95a.7.7 0 0 0 0-1L9.18 1.5a.7.7 0 0 0-.31-.19L4.56.15a.7.7 0 0 0-.68.18L1.06 3.14a.7.7 0 0 0-.18.68l1.17 4.3z"></path>
                            <circle cx="5.409" cy="4.668" r="1.403"></circle>
                        </g>
                    </svg>
                </div>
            </div>
            <div class="new-task-item">
                <div class="icon">
                    <svg viewBox="0 0 36 36">
                        <g fill="none" fill-rule="evenodd">
                            <circle cx="18" cy="18" r="17.5" stroke-dasharray="3"></circle>
                            <path d="M10.35,25.65 C10.35,20.9555796 13.7836186,17.15 18,17.15 C22.2249783,17.15 25.65,20.9651318 25.65, 25.65" stroke-linecap="round"></path>
                            <circle cx="18" cy="12.9" r="4.3"></circle>
                            <circle
                                cx="27.4" cy="27.4" fill-rule="nonzero" r="7.7"></circle>
                            <path d="M28.2,26.5 L28.2,23.946088 C28.2,23.4873147 27.819442,23.1 27.35,23.1 C26.8772851,23.1 26.5,23.4788065 26.5,23.946088 L26.5,26.5 L23.946088,26.5 C23.4873147,26.5 23.1,26.880558 23.1,27.35 C23.1,27.8227149 23.4788065,28.2 23.946088,28.2 L26.5,28.2 L26.5,30.753912 C26.5,31.2126853 26.880558,31.6 27.35,31.6 C27.8227149,31.6 28.2,31.2211935 28.2,30.753912 L28.2,28.2 L30.753912,28.2 C31.2126853,28.2 31.6,27.819442 31.6,27.35 C31.6,26.8772851 31.2211935,26.5 30.753912,26.5 L28.2,26.5 Z" fill="#FFF" fill-rule="nonzero"></path>
                        </g>
                    </svg>
                </div>
            </div>
            <div class="new-task-item">
                <div class="icon">
                    <svg height="36" viewBox="0 0 36 36" width="36">
                        <g fill="none" fill-rule="evenodd">
                            <circle cx="18" cy="18" r="17.5" stroke-dasharray="3"></circle>
                            <rect height="15.3" rx="2" width="17.1" x="9.4" y="10.3"></rect>
                            <path d="M14.4 20.2339051L16.5687413 22.05 21.6 17.55"></path>
                        </g>
                        <path d="M9.9 14.4H26.1V15.4H9.9zM12.6 8.1H13.6V12.6H12.6zM22.5 8.1H23.5V12.6H22.5z" fill-rule="nonzero"></path>
                    </svg>
                </div>
            </div>
            <div class="new-task-item">
                <div class="icon">
                    <svg height="36" viewBox="0 0 36 36" width="36">
                        <g fill="none" fill-rule="evenodd">
                            <circle cx="18" cy="18" r="17.5" stroke-dasharray="3"></circle>
                            <rect height="16.2" rx=".5" width="1" x="13.5" y="9.9"></rect>
                            <path d="M14 11.3h11.6l-3 3.5 3 3.6H14z"></path>
                        </g>
                    </svg>
                </div>
            </div>
            <div class="new-task-item">
                <input class="new-task-button" type="submit" value="Create" />
            </div>
            <div class="new-task-item" @click.prevent="close">
                <div class="icon">
                    <svg viewBox="0 0 512 512">
                        <path d="m502.43 55.57-446.9 446.9a31.97 31.97 0 0 1-45.25 0 31.97 31.97 0 0 1 0-45.26l446.9-446.9a31.97 31.97 0 0 1 45.25 0 31.97 31.97 0 0 1 0 45.26z"></path>
                        <path d="M457.17 502.47 10.28 55.57a31.97 31.97 0 0 1 0-45.25 31.97 31.97 0 0 1 45.25 0l446.9 446.89a31.97 31.97 0 0 1 0 45.26 31.97 31.97 0 0 1-45.26 0z"></path>
                    </svg>
                </div>
            </div>
        </form>
    </div>
</template>
