<script setup>
import { VideoStateManagement } from '../statemanagement/videostate.js';
import { storeToRefs } from 'pinia';
import { ref, onMounted } from 'vue';
import { Link } from '@inertiajs/vue3'
const getstate = (filename) => `/images/${filename}`;
const getvideo = (filename) => `/video/${filename}`;

const store = VideoStateManagement();
const { timer, videoRef } = storeToRefs(store);

const localVideoRef = ref(null);

onMounted(() => {
    videoRef.value = localVideoRef.value; // Assign ref correctly after mount
});
</script>


<template>
    <div>
        <div class="relative-container">
            <div class="layertop layer d-flex justify-content-between">
                <div class="logoimg">
                    <img :src="getstate('PAFALOGO.png')" alt="_image" class="img-logo">
                </div>
                <Link href="/screens/social/identity">
                <div v-if="timer > 5">
                    <button class="btn-pafa py-3">Proceed Now</button>
                </div>
            </Link>
            </div>

            <div class="layerbetween layer">
                <div class="text-center">
                    <h6>Video Demonstration</h6>
                </div>
            </div>

            <div class="layercenter layer">
                <div class="layercenterpadding">
                    <!-- Video with ref to autoplay -->
                    <video 
                        :src="getvideo('descriptionpafa.mp4')" 
                        ref="localVideoRef"
                        autoplay 
                        preload="auto" 
                        controls
                        controlsList="nofullscreen nodownload noremoteplayback"
                        disablepictureinpicture
                        oncontextmenu="return false"
                        @fullscreenchange.prevent
                        class="videoflow"
                    ></video>

                    <div class="label-success">
                        <h5>Time Count is {{ timer }} seconds</h5>
                    </div>

                 
                </div>
            </div>

            <div class="layerbottom layer">
                <div class="layerpaddingbottom"></div>
            </div>
        </div>
        <Toaster/>
    </div>
</template>

