<script setup>
const imagesPort = (filename) => `/images/${filename}`;
import { Link } from '@inertiajs/vue3';
import { storeToRefs } from 'pinia';

import {useListStore} from './statemanagement/overviewstate.js';
const listStore = useListStore();

const {
  switchlanguage,
} = storeToRefs(listStore);

</script>

<template>
    <div>
        <div class="launching-headercontainer">
         <div class="hero-section-cont">

          <div class="content-state w-100">
            <div class="d-flex justify-content-between">
              <img :src="imagesPort('PAFALOGO.png')"
               width="50"
               height="50"
              alt="">

            
              <ul class="p-0 m-0 list-none">
               <div class="d-flex align-items-center gap-2 ">

                <select class="form-select w-50" v-model="listStore.switchlanguage">
                  <option :value="true">English</option>
                  <option :value="false">Français</option>
                 </select> 
             
                  <li>
                    <Link href="/privacy" class="text-decoration-none text-dark">Privacy</Link>
                  </li>
               </div>
              </ul>

            </div>
          </div>

          <div class="">
            <div class="row gy-1 gx-2">
              <div class="col-lg-7 col md-6 col-12 h-auto-between px-3">
                
                <div class="h-auto-first">
                  <div class="card-auto">
                    <div class="bg-label-success mb-3">
                       <span>Version 1</span>
                    </div>

    
                    <template v-if="listStore.switchlanguage">
                      <div class="card-headertext mb-3 px-1">
                        <h1 class="pafa-large">Welcome To Our Launching Event</h1>
                        <span> <span class="text-decoration-underline cursor-cell">PayAfricaForArt</span> is hosting an art audiction and special training to 
                          African's all over Africa, to be well groomed to showcase our origin 
                          heritage with pride, be part of us today.
                        </span>
                      </div>
                    </template>

                    <template v-else>
                      <div class="card-headertext mb-3 px-1">
                        <h1 class="pafa-large">Bienvenue à notre événement de lancement</h1>
                        <span>
                          <span class="text-decoration-underline cursor-cell">PayAfricaForArt</span> organise une vente aux enchères d'art et une formation spéciale 
                          destinée aux Africains de tout le continent, afin de les préparer à valoriser fièrement 
                          notre patrimoine et nos origines. Rejoignez-nous dès aujourd'hui.
                        </span>
                      </div>
                    </template>

                    <Link href="/screens/starting/questions"> 
                    <button class="action-button">
                      Start with us
                    </button>
                  </Link>

                  </div>
               </div>

               <div class="h-auto-second">
                <ul class="list-none p-0 m-0">
                 <div class="d-flex flex-ci gap-1">
                  <span>Supported by</span>
                  <li>
                    <a href="https://safeart.africa"  class="text-decoration-underline text-dark">Safe Africa Foundation</a>
                  </li>
               
                 </div>


                </ul>
              </div>

              </div>
              
              <div class="col-lg-5 col md-6 col-12">
                 <div class="card bord-none">
                  <img 
                  :src="imagesPort('pafamain.png')"
                   class="img-fluid-state img-refine"
                  alt="">
                 </div>
              </div>
            </div>

          </div>

         </div>


        </div>
    </div>
</template>
