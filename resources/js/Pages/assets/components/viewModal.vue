<script setup>

const { UnClickActive, viewlists,  } = defineProps(['UnClickActive', 'viewlists',]);
</script>
<template>
    <div>
        <div class="mod-container">
            <div class="mod-bodyflex">
                <div class="mod-header">
                    <span class="fs-2">Details</span>
                    <span class="cursor-pointer" @click="UnClickActive">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Solar by 480 Design - https://creativecommons.org/licenses/by/4.0/ --><path fill="currentColor" d="M12 22c-4.714 0-7.071 0-8.536-1.465C2 19.072 2 16.714 2 12s0-7.071 1.464-8.536C4.93 2 7.286 2 12 2s7.071 0 8.535 1.464C22 4.93 22 7.286 22 12s0 7.071-1.465 8.535C19.072 22 16.714 22 12 22" opacity=".5"/><path fill="currentColor" d="M8.97 8.97a.75.75 0 0 1 1.06 0L12 10.94l1.97-1.97a.75.75 0 1 1 1.06 1.06L13.06 12l1.97 1.97a.75.75 0 1 1-1.06 1.06L12 13.06l-1.97 1.97a.75.75 0 0 1-1.06-1.06L10.94 12l-1.97-1.97a.75.75 0 0 1 0-1.06"/></svg>
                    </span>
                 </div>
                  <div class="mod-body">
                    <div class="mod-scroll">
                        <div class="" v-for="(item, index) in viewlists" :key="index">
                            <div class="">
                                 <template v-if="index == 0">
                                   <span class="fs-4">Who are you signin up for?</span>
                                 </template>
                                 <template v-if="index == 1">
                                    <span  class="fs-4">What’s your main reason for joining?</span>
                                  </template>
                                  <template v-if="index == 2">
                                    <span  class="fs-4">Have you or your child ever struggled with learning or focus?</span>
                                  </template>
                                  <template v-if="index == 3">
                                    <span  class="fs-4">How important is it for you or your child to develop a sharp and intelligent mind?</span>
                                  </template>
                                  <template v-if="index == 4">
                                    <span  class="fs-4">Have you ever tried drawing or visual exercises before?</span>
                                  </template>
                                  <template v-if="index == 6">
                                    <span  class="fs-4">If this program helps you or your child think faster and learn better, will you commit just a few minutes daily for 30 days?</span>
                                  </template>
                                  <template v-if="index == 7">
                                    <span  class="fs-4">Give the answer</span>
                                  </template>
                                <br/>
                                 <span class="fetchhighlight">*{{ item.data }}</span>
                                <br/> <br/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>