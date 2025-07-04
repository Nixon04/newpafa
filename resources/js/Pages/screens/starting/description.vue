<script setup>
import { VideoStateManagement } from '../statemanagement/videostate.js';
import {usePaymentMethod} from '../statemanagement/payment.js';

import { storeToRefs } from 'pinia';
import { ref, onMounted } from 'vue';
import { usePage } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3'
const getstate = (filename) => `/images/${filename}`;
const getvideo = (filename) => `/video/${filename}`;

const store = VideoStateManagement();
const { timer, videoRef } = storeToRefs(store);
const paymentstate = usePaymentMethod();
const localVideoRef = ref(null);

const page = usePage();

onMounted(() => {
    // const script = document.createElement('script');
    // script.src = "https://checkout.flutterwave.com/v3.js";
    // script.async = true;
    // document.body.appendChild(script);
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
                    <span class="fs-1">🎉</span>
                </div>
            </Link>
            </div>
           

            <div class="padding-layertop layer">
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
                        class="videoflow rounded"
                    ></video>


                    <div>
                        <button @click="paymentstate.StandardPayment(page.props?.id, page.props?.csrf_token)" class="btn-pafa py-3 w-100 float-right bg-dark">
                            <template v-if="paymentstate.isLoading">
                               <span>Loading ...</span>
                            </template>    
                           <template v-else>
                            <span> Pay Now and Get Enlisted</span>
                           </template>
                        </button>
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

