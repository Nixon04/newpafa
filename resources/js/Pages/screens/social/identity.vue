<script setup>
import {SocialState} from '../statemanagement/social.js';
import {storeToRefs} from 'pinia';
const getstate = (filename) => `/images/${filename}`;
const getvideo = (filename) => `/video/${filename}`;

const store = SocialState();
const {sociallinks, main} = storeToRefs(store);
</script>

<template>

    <div>
        <div class="relative-container">
            <div class="layertop layer d-flex justify-content-between">
                <div class="logoimg">
                    <img :src="getstate('PAFALOGO.png')" alt="_image" class="img-logo">
                  </div>
                  <h6>complete  </h6>
              </div>
              <div class="layerbetween layer">
                <div class="p-2 align-items-center d-flex justify-content-center ">
                    <div class="text-center">
                        <h4>Social Media HangOut · 🎉</h4>
                    </div>
                </div>
              </div>
                 <div class="layercenter layer"> 

             
                    <div class="layercenterpadding ">
                        <div>
                            <div class="padding-state" v-for="i in sociallinks" :key="i">
                                <a :href="i['link']" class="linkstate">
                                <div class="cardpad"> 
                                    <span v-if="i['id'] == 1">
                                        <img src="https://cdn2.iconfinder.com/data/icons/social-media-2285/512/1_Facebook2_colored_svg-1024.png" width="20" alt="">
                                    </span>  

                                    <span v-if="i['id'] == 2">
                                        <img src="data:image/png;base64,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" width="20" alt="">
                                    </span>  

                                    <span v-if="i['id'] == 3">
                                        <img src="https://cdn2.iconfinder.com/data/icons/social-media-2285/512/1_Instagram_colored_svg_1-256.png" width="20" alt="">
                                    </span>  

                                <span>{{ i['name']}}</span>
                                </div>
                                </a>
                            </div>

                            <div class="padding-state py-5" v-for="i in main" :key="i">
                                <a :href="i['link']" class="linkstate">
                                <div class="cardpad"> 
                                    <span v-if="i['id'] == 1">
                                        <img src="https://cdn2.iconfinder.com/data/icons/social-media-2285/512/1_Whatsapp2_colored_svg-256.png" width="20" alt="">
                                    </span>  

                                <span>{{ i['name']}}</span>
                                </div>
                                </a>
                            </div>

                        </div>
                    </div>

                </div>
            <div class="layerbottom layer">
                <div class="layerpaddingbottom">
                    
                    
                </div>
            </div>
        </div>
        <Toaster/>
    </div>
</template>
