<script setup lang="ts">
import NewTask from "@/MainContent/Components/Task/NewTask.vue";

import { ref } from "vue";

const newTaskBtn = ref<HTMLButtonElement | null>(null);
const isNewTaskOpen = ref(false);

const showNewTask = (e: PointerEvent) => {
    if (e?.target == newTaskBtn.value! && isNewTaskOpen.value) return;
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
            <div class="task-container">
                <div class="task">
                    <div class="task-main-row">
                        <div class="icon task-caret">
                            <svg viewBox="0 0 320 512">
                                <path d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"></path>
                            </svg>
                        </div>
                        <div class="task-main-status" style="--default-color: blue"></div>
                        <div class="task-main-title">
                            Plan A
                        </div>
                        <div class="task-options">
                            <div class="task-option">
                                <div class="icon">
                                    <svg style="fill: #7c828d" viewBox="0 0 16 16">
                                        <path clip-rule="evenodd" d="M2 3.5a2.5 2.5 0 1 1 3 2.45V9.5A2.5 2.5 0 0 0 7.5 12h2.55a2.5 2.5 0 1 1 0 1H7.5A3.5 3.5 0 0 1 4 9.5V5.95A2.5 2.5 0 0 1 2 3.5zM4.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm8 9a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm0-10a.5.5 0 0 1 .5.5V3h1.5a.5.5 0 0 1 0 1H13v1.5a.5.5 0 0 1-1 0V4h-1.5a.5.5 0 0 1 0-1H12V1.5a.5.5 0 0 1 .5-.5z" fill-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="task-option">
                                <div class="icon">
                                    <svg style="stroke: #7c828d" viewBox="0 0 23 20" xmlns="http://www.w3.org/2000/svg">
                                        <g fill="none" fill-rule="evenodd" transform="translate(0 1)">
                                            <path d="M14.18 16.24l.68.61c.68.68 1.8.68 2.5-.03l4.41-4.4c.7-.7.71-1.83.03-2.51l-8.22-8.22a1.72 1.72 0 0 0-.77-.45L9.37.3a2.25 2.25 0 0 0-.8-.06c-.25.03-.5.1-.7.22a.87.87 0 0 0-.36.35"></path>
                                            <path d="M2.06 8.13c.03.11.09.22.18.3l9.16 9.17a.7.7 0 0 0 .99 0l5.95-5.95a.7.7 0 0 0 0-1L9.18 1.5a.7.7 0 0 0-.31-.19L4.56.15a.7.7 0 0 0-.68.18L1.06 3.14a.7.7 0 0 0-.18.68l1.17 4.3z"></path>
                                            <circle cx="5.409" cy="4.668" r="1.403"></circle>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                            <div class="task-option">
                                <div class="icon">
                                    <svg style="fill: #7c828d" viewBox="0 0 14 14">
                                        <path clip-rule="evenodd" d="M11.35 1.263a1.312 1.312 0 0 0-1.857 0l-1.05 1.05-.002.003-.002.001-7.436 7.436a.437.437 0 0 0-.128.31v2.624c0 .242.196.438.438.438h2.625a.437.437 0 0 0 .309-.128l7.436-7.436.001-.002.002-.001 1.05-1.051a1.312 1.312 0 0 0 0-1.856L11.35 1.263zm-9.6 8.98 7-7 2.006 2.007-7 7H1.75v-2.006zm7.619-7.618 2.006 2.006.743-.743a.438.438 0 0 0 0-.619l-1.387-1.387a.437.437 0 0 0-.62 0l-.742.743z" fill-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="task-row row-assignee">
                        <div class="avatar-group -space-x-3">
                            <div class="avatar">
                                <div class="w-6">
                                    <img src="https://faces-img.xcdn.link/image-lorem-face-566.jpg" />
                                </div>
                            </div>
                            <div class="avatar">
                                <div class="w-6">
                                    <img src="https://faces-img.xcdn.link/image-lorem-face-566.jpg" />
                                </div>
                            </div>
                            <div class="avatar">
                                <div class="w-6">
                                    <img src="https://faces-img.xcdn.link/image-lorem-face-566.jpg" />
                                </div>
                            </div>
                            <div class="avatar placeholder">
                                <div class="w-6 bg-neutral-focus text-neutral-content">
                                    <span style="font-size: 12px">+1</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="task-row row-due-date date-over">
                        13/2/2022
                    </div>
                    <div class="task-row row-priority" style="fill: red">
                        <div class="icon">
                            <svg viewBox="0 0 24 24">
                                <path d="M4.6.5c.4 0 .6.3.6.6v21.7c0 .4-.3.6-.6.6-.4 0-.6-.3-.6-.6V1c0-.2.3-.5.6-.5z"></path>
                                <path d="M4.6 2.4H21l-4 5 4 5.2H4.7"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="task-row option">
                        <div class="icon">
                            <svg enable-background="new 0 0 60 60" viewBox="0 0 60 60">
                                <path d="M8 22c-4.411 0-8 3.589-8 8s3.589 8 8 8 8-3.589 8-8-3.589-8-8-8zM52 22c-4.411 0-8 3.589-8 8s3.589 8 8 8 8-3.589 8-8-3.589-8-8-8zM30 22c-4.411 0-8 3.589-8 8s3.589 8 8 8 8-3.589 8-8-3.589-8-8-8z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="sub-task-container">
                    <div class="task sub-task">
                        <div class="task-main-row">
                            <div class="task-main-status" style="--default-color: blue"></div>
                            <div class="task-main-title">
                                Plan A
                            </div>
                            <div class="task-options">
                                <div class="task-option">
                                    <div class="icon">
                                        <svg style="fill: #7c828d;" viewBox="0 0 16 16">
                                            <path clip-rule="evenodd" d="M2 3.5a2.5 2.5 0 1 1 3 2.45V9.5A2.5 2.5 0 0 0 7.5 12h2.55a2.5 2.5 0 1 1 0 1H7.5A3.5 3.5 0 0 1 4 9.5V5.95A2.5 2.5 0 0 1 2 3.5zM4.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm8 9a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm0-10a.5.5 0 0 1 .5.5V3h1.5a.5.5 0 0 1 0 1H13v1.5a.5.5 0 0 1-1 0V4h-1.5a.5.5 0 0 1 0-1H12V1.5a.5.5 0 0 1 .5-.5z" fill-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="task-option">
                                    <div class="icon">
                                        <svg style="stroke: #7c828d;" viewBox="0 0 23 20" xmlns="http://www.w3.org/2000/svg">
                                            <g fill="none" fill-rule="evenodd" transform="translate(0 1)">
                                                <path d="M14.18 16.24l.68.61c.68.68 1.8.68 2.5-.03l4.41-4.4c.7-.7.71-1.83.03-2.51l-8.22-8.22a1.72 1.72 0 0 0-.77-.45L9.37.3a2.25 2.25 0 0 0-.8-.06c-.25.03-.5.1-.7.22a.87.87 0 0 0-.36.35"></path>
                                                <path d="M2.06 8.13c.03.11.09.22.18.3l9.16 9.17a.7.7 0 0 0 .99 0l5.95-5.95a.7.7 0 0 0 0-1L9.18 1.5a.7.7 0 0 0-.31-.19L4.56.15a.7.7 0 0 0-.68.18L1.06 3.14a.7.7 0 0 0-.18.68l1.17 4.3z"></path>
                                                <circle cx="5.409" cy="4.668" r="1.403"></circle>
                                            </g>
                                        </svg>
                                    </div>
                                </div>
                                <div class="task-option">
                                    <div class="icon">
                                        <svg style="fill: #7c828d;" viewBox="0 0 14 14">
                                            <path clip-rule="evenodd" d="M11.35 1.263a1.312 1.312 0 0 0-1.857 0l-1.05 1.05-.002.003-.002.001-7.436 7.436a.437.437 0 0 0-.128.31v2.624c0 .242.196.438.438.438h2.625a.437.437 0 0 0 .309-.128l7.436-7.436.001-.002.002-.001 1.05-1.051a1.312 1.312 0 0 0 0-1.856L11.35 1.263zm-9.6 8.98 7-7 2.006 2.007-7 7H1.75v-2.006zm7.619-7.618 2.006 2.006.743-.743a.438.438 0 0 0 0-.619l-1.387-1.387a.437.437 0 0 0-.62 0l-.742.743z" fill-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="task-row row-assignee">
                            <div class="avatar-group -space-x-3">
                                <div class="avatar">
                                    <div class="w-6">
                                        <img src="https://faces-img.xcdn.link/image-lorem-face-566.jpg" />
                                    </div>
                                </div>
                                <div class="avatar">
                                    <div class="w-6">
                                        <img src="https://faces-img.xcdn.link/image-lorem-face-566.jpg" />
                                    </div>
                                </div>
                                <div class="avatar">
                                    <div class="w-6">
                                        <img src="https://faces-img.xcdn.link/image-lorem-face-566.jpg" />
                                    </div>
                                </div>
                                <div class="avatar placeholder">
                                    <div class="w-6 bg-neutral-focus text-neutral-content">
                                        <span style="font-size: 12px;">+1</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="task-row row-due-date date-over">
                            13/2/2022
                        </div>
                        <div class="task-row row-priority" style="fill: red">
                            <div class="icon">
                                <svg viewBox="0 0 24 24">
                                    <path d="M4.6.5c.4 0 .6.3.6.6v21.7c0 .4-.3.6-.6.6-.4 0-.6-.3-.6-.6V1c0-.2.3-.5.6-.5z"></path>
                                    <path d="M4.6 2.4H21l-4 5 4 5.2H4.7"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="task-row option">
                            <div class="icon">
                                <svg enable-background="new 0 0 60 60" viewBox="0 0 60 60">
                                    <path d="M8 22c-4.411 0-8 3.589-8 8s3.589 8 8 8 8-3.589 8-8-3.589-8-8-8zM52 22c-4.411 0-8 3.589-8 8s3.589 8 8 8 8-3.589 8-8-3.589-8-8-8zM30 22c-4.411 0-8 3.589-8 8s3.589 8 8 8 8-3.589 8-8-3.589-8-8-8z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="task sub-task">
                        <div class="task-main-row">
                            <div class="task-main-status" style="--default-color: blue"></div>
                            <div class="task-main-title">
                                Plan A
                            </div>
                            <div class="task-options">
                                <div class="task-option">
                                    <div class="icon">
                                        <svg style="
                                                                fill: #7c828d;
                                                            " viewBox="0 0 16 16">
                                            <path clip-rule="evenodd" d="M2 3.5a2.5 2.5 0 1 1 3 2.45V9.5A2.5 2.5 0 0 0 7.5 12h2.55a2.5 2.5 0 1 1 0 1H7.5A3.5 3.5 0 0 1 4 9.5V5.95A2.5 2.5 0 0 1 2 3.5zM4.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm8 9a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm0-10a.5.5 0 0 1 .5.5V3h1.5a.5.5 0 0 1 0 1H13v1.5a.5.5 0 0 1-1 0V4h-1.5a.5.5 0 0 1 0-1H12V1.5a.5.5 0 0 1 .5-.5z" fill-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="task-option">
                                    <div class="icon">
                                        <svg style="
                                                                stroke: #7c828d;
                                                            " viewBox="0 0 23 20" xmlns="http://www.w3.org/2000/svg">
                                            <g fill="none" fill-rule="evenodd" transform="translate(0 1)">
                                                <path d="M14.18 16.24l.68.61c.68.68 1.8.68 2.5-.03l4.41-4.4c.7-.7.71-1.83.03-2.51l-8.22-8.22a1.72 1.72 0 0 0-.77-.45L9.37.3a2.25 2.25 0 0 0-.8-.06c-.25.03-.5.1-.7.22a.87.87 0 0 0-.36.35"></path>
                                                <path d="M2.06 8.13c.03.11.09.22.18.3l9.16 9.17a.7.7 0 0 0 .99 0l5.95-5.95a.7.7 0 0 0 0-1L9.18 1.5a.7.7 0 0 0-.31-.19L4.56.15a.7.7 0 0 0-.68.18L1.06 3.14a.7.7 0 0 0-.18.68l1.17 4.3z"></path>
                                                <circle cx="5.409" cy="4.668" r="1.403"></circle>
                                            </g>
                                        </svg>
                                    </div>
                                </div>
                                <div class="task-option">
                                    <div class="icon">
                                        <svg style="
                                                                fill: #7c828d;
                                                            " viewBox="0 0 14 14">
                                            <path clip-rule="evenodd" d="M11.35 1.263a1.312 1.312 0 0 0-1.857 0l-1.05 1.05-.002.003-.002.001-7.436 7.436a.437.437 0 0 0-.128.31v2.624c0 .242.196.438.438.438h2.625a.437.437 0 0 0 .309-.128l7.436-7.436.001-.002.002-.001 1.05-1.051a1.312 1.312 0 0 0 0-1.856L11.35 1.263zm-9.6 8.98 7-7 2.006 2.007-7 7H1.75v-2.006zm7.619-7.618 2.006 2.006.743-.743a.438.438 0 0 0 0-.619l-1.387-1.387a.437.437 0 0 0-.62 0l-.742.743z" fill-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="task-row row-assignee">
                            <div class="avatar-group -space-x-3">
                                <div class="avatar">
                                    <div class="w-6">
                                        <img src="https://faces-img.xcdn.link/image-lorem-face-566.jpg" />
                                    </div>
                                </div>
                                <div class="avatar">
                                    <div class="w-6">
                                        <img src="https://faces-img.xcdn.link/image-lorem-face-566.jpg" />
                                    </div>
                                </div>
                                <div class="avatar">
                                    <div class="w-6">
                                        <img src="https://faces-img.xcdn.link/image-lorem-face-566.jpg" />
                                    </div>
                                </div>
                                <div class="avatar placeholder">
                                    <div class="w-6 bg-neutral-focus text-neutral-content">
                                                    <span style="
                                                                font-size: 12px;
                                                            ">+1</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="task-row row-due-date date-over">
                            13/2/2022
                        </div>
                        <div class="task-row row-priority" style="fill: red">
                            <div class="icon">
                                <svg viewBox="0 0 24 24">
                                    <path d="M4.6.5c.4 0 .6.3.6.6v21.7c0 .4-.3.6-.6.6-.4 0-.6-.3-.6-.6V1c0-.2.3-.5.6-.5z"></path>
                                    <path d="M4.6 2.4H21l-4 5 4 5.2H4.7"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="task-row option">
                            <div class="icon">
                                <svg enable-background="new 0 0 60 60" viewBox="0 0 60 60">
                                    <path d="M8 22c-4.411 0-8 3.589-8 8s3.589 8 8 8 8-3.589 8-8-3.589-8-8-8zM52 22c-4.411 0-8 3.589-8 8s3.589 8 8 8 8-3.589 8-8-3.589-8-8-8zM30 22c-4.411 0-8 3.589-8 8s3.589 8 8 8 8-3.589 8-8-3.589-8-8-8z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="task-container">
                <div class="task">
                    <div class="task-main-row">
                        <div class="task-main-status" style="--default-color: blue"></div>
                        <div class="task-main-title">
                            Plan B
                        </div>
                        <div class="task-options">
                            <div class="task-option">
                                <div class="icon">
                                    <svg style="fill: #7c828d" viewBox="0 0 16 16">
                                        <path clip-rule="evenodd" d="M2 3.5a2.5 2.5 0 1 1 3 2.45V9.5A2.5 2.5 0 0 0 7.5 12h2.55a2.5 2.5 0 1 1 0 1H7.5A3.5 3.5 0 0 1 4 9.5V5.95A2.5 2.5 0 0 1 2 3.5zM4.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm8 9a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm0-10a.5.5 0 0 1 .5.5V3h1.5a.5.5 0 0 1 0 1H13v1.5a.5.5 0 0 1-1 0V4h-1.5a.5.5 0 0 1 0-1H12V1.5a.5.5 0 0 1 .5-.5z" fill-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="task-option">
                                <div class="icon">
                                    <svg style="stroke: #7c828d" viewBox="0 0 23 20" xmlns="http://www.w3.org/2000/svg">
                                        <g fill="none" fill-rule="evenodd" transform="translate(0 1)">
                                            <path d="M14.18 16.24l.68.61c.68.68 1.8.68 2.5-.03l4.41-4.4c.7-.7.71-1.83.03-2.51l-8.22-8.22a1.72 1.72 0 0 0-.77-.45L9.37.3a2.25 2.25 0 0 0-.8-.06c-.25.03-.5.1-.7.22a.87.87 0 0 0-.36.35"></path>
                                            <path d="M2.06 8.13c.03.11.09.22.18.3l9.16 9.17a.7.7 0 0 0 .99 0l5.95-5.95a.7.7 0 0 0 0-1L9.18 1.5a.7.7 0 0 0-.31-.19L4.56.15a.7.7 0 0 0-.68.18L1.06 3.14a.7.7 0 0 0-.18.68l1.17 4.3z"></path>
                                            <circle cx="5.409" cy="4.668" r="1.403"></circle>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                            <div class="task-option">
                                <div class="icon">
                                    <svg style="fill: #7c828d" viewBox="0 0 14 14">
                                        <path
                                            clip-rule="evenodd"
                                            d="M11.35 1.263a1.312 1.312 0 0 0-1.857 0l-1.05 1.05-.002.003-.002.001-7.436 7.436a.437.437 0 0 0-.128.31v2.624c0 .242.196.438.438.438h2.625a.437.437 0 0 0 .309-.128l7.436-7.436.001-.002.002-.001 1.05-1.051a1.312 1.312 0 0 0 0-1.856L11.35 1.263zm-9.6 8.98 7-7 2.006 2.007-7 7H1.75v-2.006zm7.619-7.618 2.006 2.006.743-.743a.438.438 0 0 0 0-.619l-1.387-1.387a.437.437 0 0 0-.62 0l-.742.743z"
                                            fill-rule="evenodd"
                                        ></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="task-row row-assignee">
                        <div class="icon" style="width: 24px; height: 24px">
                            <svg class="assign-icon" viewBox="0 0 36 36">
                                <g fill="none" fill-rule="evenodd">
                                    <circle cx="18" cy="18" r="17.5" stroke-dasharray="3"></circle>
                                    <path d="M10.35,25.65 C10.35,20.9555796 13.7836186,17.15 18,17.15 C22.2249783,17.15 25.65,20.9651318 25.65, 25.65" stroke-linecap="round"></path>
                                    <circle cx="18" cy="12.9" r="4.3"></circle>
                                    <circle cx="27.4" cy="27.4" fill-rule="nonzero" r="7.7"></circle>
                                    <path d="M28.2,26.5 L28.2,23.946088 C28.2,23.4873147 27.819442,23.1 27.35,23.1 C26.8772851,23.1 26.5, 23.4788065 26.5,23.946088 L26.5,26.5 L23.946088,26.5 C23.4873147,26.5 23.1,26.880558 23.1,27.35 C23.1, 27.8227149 23.4788065,28.2 23.946088,28.2 L26.5,28.2 L26.5,30.753912 C26.5,31.2126853 26.880558,31.6 27.35, 31.6 C27.8227149,31.6 28.2,31.2211935 28.2,30.753912 L28.2,28.2 L30.753912,28.2 C31.2126853,28.2 31.6, 27.819442 31.6,27.35 C31.6,26.8772851 31.2211935,26.5 30.753912,26.5 L28.2,26.5 Z" fill="#FFF" fill-rule="nonzero"></path>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <div class="task-row row-due-date date-over">
                        13/2/2022
                    </div>
                    <div class="task-row row-priority" style="fill: red">
                        <div class="icon">
                            <svg viewBox="0 0 24 24">
                                <path d="M4.6.5c.4 0 .6.3.6.6v21.7c0 .4-.3.6-.6.6-.4 0-.6-.3-.6-.6V1c0-.2.3-.5.6-.5z"></path>
                                <path d="M4.6 2.4H21l-4 5 4 5.2H4.7"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="task-row option">
                        <div class="icon">
                            <svg enable-background="new 0 0 60 60" viewBox="0 0 60 60">
                                <path d="M8 22c-4.411 0-8 3.589-8 8s3.589 8 8 8 8-3.589 8-8-3.589-8-8-8zM52 22c-4.411 0-8 3.589-8 8s3.589 8 8 8 8-3.589 8-8-3.589-8-8-8zM30 22c-4.411 0-8 3.589-8 8s3.589 8 8 8 8-3.589 8-8-3.589-8-8-8z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <NewTask v-if="isNewTaskOpen" v-click-outside="showNewTask" @close="showNewTask"/>
            <button class="new-task-group" ref="newTaskBtn" @click="showNewTask">+ New task</button>
        </div>
    </div>
<!--    <slot />-->
</template>
