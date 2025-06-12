<template>
    <div>
          <div class="relative-slide">
            <div class="first-slide">
               <div class="d-flex justify-content-between align-items-center">
                <div class="logoimg">
                    <img :src="getimage('PAFALOGO.png')" alt="_image" class="img-logo">
                  </div>
                   <div class="center">
                     <h1 class="fs-1">Overview</h1>
                   </div>
                     <div class="center">
                      <h1 class="fs-6">unassigned</h1>
                  </div>
               </div>
            </div>
    
          <section>
            <div class="second-slide" :style="{backgroundImage: `url(${getimage('refined.png')})`,
            backgroundSize: 'contain',
            backgroundBlendMode: 'darken',
             }">
                <div class="statecenter">
                    <h1 class="fw-stateheader header-bran mb-3 fw-bold fs-1">Hey Welcome to our pre-launch status</h1>
                    <h4 class="mb-5 fs-6 align-items-center text-align-center">We are here to get your started you will be prompted to answer some questions, enjoy your time as we spared through this journey together</h4>
                   <Link href="/screens/starting/questions">
                    <button class="btn-state ">Get Started</button>
                   </Link>
                </div>
            </div>
          </section>
            <div class="third-slide">
                <div class="d-flex justify-content-between">
                    <div class="d-flex">
                        <h1 class="fs-1">Pafa</h1>
                    </div>
                    <div class="d-flex gap-20">
                        <a href="" class="href-state">
                           Privacy
                        </a>
                        <a href="" class="href-state">
                            Terms & Conditions
                         </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {Link} from '@inertiajs/vue3';
 export default {
    components:{
    Link,
    },
  
    methods:{
        getimage(filename){
            return `/images/${filename}`
        }
    }
 }
</script>