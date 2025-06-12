import { defineStore } from 'pinia';
import { ref, onUnmounted, onMounted, watch } from 'vue';
import "@steveyuowo/vue-hot-toast/vue-hot-toast.css";

export const VideoStateManagement = defineStore('main_video', () => {
    const videoRef = ref(null);
    const timer = ref(0);
    let animationFrameId = null;
    let showflag = false;

    const updateTimer = () => {
        if (videoRef.value) {
            timer.value = Math.floor(videoRef.value.currentTime);
            animationFrameId = requestAnimationFrame(updateTimer);
            // if(timer.value == 5 && !showflag){
            //     toast.error('Value equivalent to 5');
            //     showflag = true;
            // }
        }
    };

    const startTimer = () => {
        if (!animationFrameId) {
            updateTimer(); // Start updating continuously
        }
    };

    const pauseTimer = () => {
        if (animationFrameId) {
            cancelAnimationFrame(animationFrameId);
            animationFrameId = null;
        }
    };

    const resetTimer = () => {
        pauseTimer();
        timer.value = 0; // Reset only when video ends
    };

    const addEventListeners = () => {
        if (videoRef.value) {
            videoRef.value.addEventListener('play', startTimer);
            videoRef.value.addEventListener('pause', pauseTimer);
            videoRef.value.addEventListener('ended', resetTimer);
        }
    };

    const removeEventListeners = () => {
        if (videoRef.value) {
            videoRef.value.removeEventListener('play', startTimer);
            videoRef.value.removeEventListener('pause', pauseTimer);
            videoRef.value.removeEventListener('ended', resetTimer);
        }
    };

    // 🔥 WATCH for `videoRef` when it's assigned in the template
    watch(videoRef, (newVal) => {
        if (newVal) {
            addEventListeners();
        }
    });

    onMounted(() => {
        if (videoRef.value) {
            videoRef.value.disablePictureInPicture = true; // Force disable PiP
        }
    });

    onUnmounted(() => {
        pauseTimer();
        removeEventListeners();
    });

    return {
        videoRef,
        timer,
    };
});
