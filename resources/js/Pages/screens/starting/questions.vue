
<script setup>


import {storeToRefs} from 'pinia';
import { Toaster, toast } from "@steveyuowo/vue-hot-toast";
import {useListStore} from '../statemanagement/overviewstate.js';
import {computed, onMounted} from 'vue';
import { usePage } from '@inertiajs/vue3';

const pages = usePage();


const store = useListStore();
const 
{count, firstquestions,
     indexstatus,
    currentstep,
    secondquestion,
    thirdquestion,
    forthquestion,
    fifthquestion,
    sixquestion,
    sevenquestion,
    isPosVisible,
    answers,
    ip,
    vpn,
    country,
    country_code,
    number,
    userdetails,
    isLoading,
    countries,
    } 
= storeToRefs(store);

const {increment} = store;
const {changeindex} = store;
const {nextstop} = store;
const {prevstop} = store;
const {updateAnswer} = store
const {clearAnswers} = store;
const {submit} = store;
const {alertforvpn} = store;
const {ResetQuestion} = store;

const getstate = (filename) => `/images/${filename}`;

onMounted(() => {
    alertforvpn(pages.props.csrf_token);
});

</script>

<template>
    <div>
        <div class="relative-container">
            <div class="layertop layer d-flex justify-content-between">
                <div class="logoimg">
                    <img :src="getstate('PAFALOGO.png')" alt="_image" class="img-logo">
                  </div>
                  <div class="d-flex gap-4 align-items-center ">
                    <div @click="ResetQuestion()" class="resetphase">Reset</div>
                  <select class="form-select w-50" v-model="store.switchlanguage">
                    <option :value="false">English</option>
                    <option :value="true">Français</option>
                   </select> 
               
                   <template v-if="isPosVisible">
                    <div class="placeholder-glow mt-2">
                        <span class="placeholder col-12">loading</span>
                      </div>
                   </template>

                   <template v-else>
                    {{ country_code ?? 'no value' }}
                   </template>

                   <template v-if="isPosVisible">
                    <div class="placeholder-glow mt-2">
                        <span class="placeholder">loading</span>
                      </div>
                   </template>

                   <template v-else>
                    <img :src="`https://flagcdn.com/48x36/${country_code.toLowerCase()}.png`" width="30" alt="Flag" />
                   </template>

                  </div>
              </div>
              
              <div class="layerbetween layer">
                <div class="p-2 align-items-center d-flex justify-content-center ">
                    <div v-if="currentstep == '0'">
                        <h4 class="font-level">
                          {{ store.switchlanguage ? 'Pour qui vous inscrivez-vous ?' : 'Who are you signing up for?' }}
                        </h4>
                      </div>
                      
                      <div v-if="currentstep == '1'">
                        <h4 class="font-level">
                          {{ store.switchlanguage ? 'Quelle est votre principale raison de vous inscrire ?' : 'What’s your main reason for joining?' }}
                        </h4>
                      </div>
                      
                      <div v-if="currentstep == '2'">
                        <h4 class="font-level">
                          {{ store.switchlanguage ? 'Vous ou votre enfant avez-vous déjà eu des difficultés d’apprentissage ou de concentration ?' : 'Have you or your child ever struggled with learning or focus?' }}
                        </h4>
                      </div>
                      
                      <div v-if="currentstep == '3'">
                        <h6 class="font-level">
                          {{ store.switchlanguage ? 'À quel point est-il important pour vous ou votre enfant de développer un esprit vif et intelligent ?' : 'How important is it for you or your child to develop a sharp and intelligent mind?' }}
                        </h6>
                      </div>
                      
                      <div v-if="currentstep == '4'">
                        <h4 class="font-level">
                          {{ store.switchlanguage ? 'Avez-vous déjà essayé des exercices de dessin ou des exercices visuels ?' : 'Have you ever tried drawing or visual exercises before?' }}
                        </h4>
                      </div>
                      
                      <div v-if="currentstep == '5'">
                        <h4 class="font-level">
                          {{ store.switchlanguage ? 'Si ce programme vous aide, vous ou votre enfant, à penser plus rapidement et à mieux apprendre, vous engagerez-vous à y consacrer quelques minutes par jour pendant 30 jours ?' : 'If this program helps you or your child think faster and learn better, will you commit just a few minutes daily for 30 days?' }}
                        </h4>
                      </div>
                      
                      <div v-if="currentstep == '6'">
                        <h4 class="font-level">
                          {{ store.switchlanguage ? 'Entrez votre réponse' : 'Give the answer' }}
                        </h4>
                      </div>
                      

                    <div v-if="currentstep == '7'">
                        <h4 class="font-level ">Fill Your Details</h4>
                    </div>



                </div>
              </div>
                 <div class="layercenter layer">
                                <div class="layercenterpadding" v-if="currentstep == '0' ">
                                        <div v-for="i in firstquestions" :key="i">
                                            <div class="padding-state" @click="changeindex(i['id'], i['name'])">
                                                <div :class="answers[currentstep] === i['name'] ? 'cardpad-focus' : 'cardpad'">    
                                                <span>{{i['name']}}</span>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                                <div class="layercenterpadding" v-if="currentstep == '1' ">
                                    <div v-for="i in secondquestion" :key="i">
                                        <div class="padding-state" @click="changeindex(i['id'], i['name'])">
                                            <div :class="i['name'] == answers[currentstep] ? 'cardpad-focus' : 'cardpad'">    
                                            <span>{{i['name']}}</span>
                                            </div>
                                        </div>
                                    </div>
                              </div>

                            <div class="layercenterpadding" v-if="currentstep == '2' ">
                                <div v-for="i in thirdquestion" :key="i">
                                    <div class="padding-state" @click="changeindex(i['id'], i['name'])">
                                        <div :class="i['name'] == answers[currentstep] ? 'cardpad-focus' : 'cardpad'">    
                                        <span>{{i['name']}}</span>
                                        </div>
                                    </div>
                                </div>
                           </div>

                        <div class="layercenterpadding" v-if="currentstep == '3' ">
                            <div v-for="i in forthquestion" :key="i">
                                <div class="padding-state" @click="changeindex(i['id'], i['name'])">
                                    <div :class="i['name'] == answers[currentstep] ? 'cardpad-focus' : 'cardpad'">    
                                    <span>{{i['name']}}</span>
                                    </div>
                                </div>
                            </div>
                       </div>

                    <div class="layercenterpadding" v-if="currentstep == '4' ">
                        <div v-for="i in fifthquestion" :key="i">
                            <div class="padding-state" @click="changeindex(i['id'], i['name'])">
                                <div :class="i['name'] == answers[currentstep] ? 'cardpad-focus' : 'cardpad'">    
                                <span>{{i['name']}}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="layercenterpadding" v-if="currentstep == '5' ">
                        <div v-for="i in sixquestion" :key="i">
                            <div class="padding-state" @click="changeindex(i['id'],i['name'])">
                                <div :class="i['name'] == answers[currentstep] ? 'cardpad-focus' : 'cardpad'">    
                                <span>{{i['name']}}</span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="layercenterpadding" v-if="currentstep == '6'">
                        <div v-for="i in sevenquestion" :key="i">
                            <div class="padding-state" @click="changeindex(i['id'],i['name'])">
                                <div :class="i['name'] == answers[currentstep] ? 'cardpad-focus' : 'cardpad'">    
                                <span>{{i['name']}}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="layercenterpadding" v-if="currentstep == '6' ">
                        <div class="text-center">
                            <h6>2 + 6 =  {{number}}</h6>
                        </div>
                       <input type="number"  @input="updateAnswer()" placeholder="Enter your answer" v-model="number" class="form-control py-3">
                    </div> -->

                    <div class="layercenterpaddingmain" v-if="currentstep == '7' ">
                        <div class="text-center mb-3">
                            Enter your details 
                        </div>

                        <div class="input-dev mb-3">
                            <input type="text" v-model="userdetails.fullname" placeholder="Enter your FullName" class="form-control py-3">
                        </div>

                        <div class="phone-input">
                            <select v-model="userdetails.countryCode" class="selectguard">
                              <option v-for="country in countries" :key="country.code" :value="country.dialCode">
                               ({{ country.dialCode }})
                              </option>
                            </select>
                            <input v-model="userdetails.contact" type="text" class="inputguard" placeholder="Enter phone number" />
                        </div>

                        <div class="input-dev mb-3">
                            <input type="text" v-model="userdetails.email" placeholder="Email Address" class="form-control py-3">
                        </div>

                        <div class="input-dev mb-3" v-if="answers[0] == 'My Child' ">
                            <input type="text" placeholder="How Many Children" v-model="userdetails.members" class="form-control py-3">
                        </div>

                        <div class="input-dev mb-3" v-if="answers[0] == 'A family member' ">
                            <input type="text" placeholder="How Many members" v-model="userdetails.members" class="form-control py-3">
                        </div>

                         
                    </div>
                    <!-- <p v-if="isLoading">Loading...</p>
                    <p v-else>awaiting</p> -->
                </div>
            <div class="layerbottom layer">
                <div class="layerpaddingbottom">
                    <button  @click="prevstop()" :disabled=" isLoading ||  currentstep === 0 " :class="currentstep === 0 ? 'btn-state-disabled py-3 cursor-not-allowed' : 'btn-pafa' " >prev</button>
                        <div v-if="currentstep == '7'">
                            <button :class="isLoading? 'btn-pafa-disabled cursor-not-allowed py-3': 'btn-pafa py-3' " :disabled="isLoading ? 'btn-state-disabled py-3 cursor-not-allowed' : 'btn-pafa py-3' " @click="submit()" >
                                <div v-if="isLoading">loading...</div>
                                <div v-else @click="submit()">
                                  Submit
                              </div>
                            </button>
                        </div>
                        
                    <div v-else>
                        <button :class="!answers[currentstep] ||  isLoading ?  'btn-pafa-disabled py-3 cursor-not-allowed' : 'btn-pafa py-3' "  @click="nextstop()" :disabled="!answers[currentstep] || isLoading">
                            <div v-if="isLoading">loading...</div>
                              <div v-else>
                                Next
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <Toaster/>
    </div>
</template>










