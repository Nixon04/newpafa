<script setup>
const imagesPort = (filename) => `/images/${filename}`;
import { storeToRefs } from 'pinia';
import  {useChangeState} from './statemanagement/changestate.js';
import { onMounted } from 'vue';
const statefill = useChangeState();
const {
    isfilltap,
} = storeToRefs(statefill);


onMounted(() => {
    statefill.changeStatePolicy('terms');
})
</script>

<template>
    <div>
        <div class="privacy-container">
            <div class="privacy-content">
                <div class="back-route mb-3"></div>
                <h2 class="mb-3">TERMS & CONDITIONS</h2>
                <div class="alert-changes flex-start">
                    <h4 class="mb-3">MARCH 2023</h4>
            
                </div>
                <h5>Last Updated: JAN 25</h5>


                <div class="change_state-container">
                    <div class="change-state-mood">
                        <div :class="[ isfilltap === 'terms' ? 'state-active-border' : 'state-none-active']"
                        @click="statefill.changeStatePolicy('terms')"
                        >                  
                              <span>Terms & Condition</span>
                      </div>

                      <div :class="[ isfilltap === 'privacy' ? 'state-active-border' : 'state-none-active']"
                      @click="statefill.changeStatePolicy('privacy')"
                      >
                        <span>Privacy</span>
                      </div>

                      <div :class="[ isfilltap === 'refund' ? 'state-active-border' : 'state-none-active']"
                      @click="statefill.changeStatePolicy('refund')"
                      >
                        <span>Refund Policy</span>
                      </div>

                    </div>
                </div>

               <template v-if="isfilltap == 'terms' ">
                <div class="mt-3">
                    <span>
                        Welcome to our 30-Day Visual Perception Development Program. By accessing our platform and making a registration payment, you agree to be bound by the following Terms and Conditions. Please read them carefully.
                    </span>
                </div>

                <!-- second -->


                <div class="mt-3">
                    <h4 class="mb-3">1. Program Description</h4>
                    <span>
                        Our program is designed to develop cognitive sharpness and visual perception skills in children, individuals with special needs, and adults. While the core 30-day curriculum is provided free of charge, a token registration fee is required to gain access to our platform, resources, and community.
                    </span>
                </div>

                <div class="mt-3">
                    <h4 class="mb-3">2. Payment Terms</h4>
                    <span class="mb-3">
                        . ⁠A one-time, non-refundable registration fee is required for platform access.
                    </span>

                    <span class="mb-3">
                       . ⁠Payment grants access to all 30 days of instructional content, community support, and post-program opportunities.
                    </span>
                </div>



                <div class="mt-3">
                    <h4 class="mb-3">3. Eligibility</h4>
                    <span class="mt-1">Participate Must</span>
                    <span class="mb-3">
                       . Be at least 5 years old or supervised by a parent/guardian. 
                           </span>

                    <span class="mb-3">
                        . Provide accurate information during registration.
                    </span>
                </div>


                <div class="mt-3">
                    <h4 class="mb-3">4. Intellectual Property</h4>
                    <span class="mb-3">
                        All content provided on the platform, including video lessons, graphics, and support materials, are the intellectual property of our organization. You agree not to copy, distribute, or use the content for commercial purposes without written permission.
                    </span>
                </div>


                <div class="mt-3">
                    <h4 class="mb-3">5. Code of Conduct</h4>
                    <span class="mt-1">Participants agree to</span>
                    <span class="mb-3">
                        •⁠  ⁠Engage respectfully in the community.
                    </span>

                    <span class="mb-3">
                        •⁠  ⁠Avoid sharing offensive or harmful content.
                    </span>

                    <span class="mb-3">
                        •⁠  ⁠Respect other participants and the instructional team.
                    </span>
                </div>

                <div class="mt-3">
                    <h4 class="mb-3">6. Limitation of Liability</h4>
                    <span class="mb-3">
                        We do not guarantee specific academic results or professional outcomes. The program is a developmental tool designed to enhance learning potential.                    </span>
                </div>

                <div class="mt-3">
                    <h4 class="mb-3">7. Amendments</h4>
                    <span class="mb-3">
                        We reserve the right to update these terms at any time. Continued use of the platform constitutes acceptance of any changes.
                        </span>
               </div>
               </template>

               <!-- second call -->

               <template v-if="isfilltap == 'privacy'">

                <div class="mt-3">
                    <span>
                        We value your privacy. This policy outlines how we collect, use, and protect your information.
                    </span>
                </div>

                <!-- second -->


                <div class="mt-3">
                    <h4 class="mb-3">1. Information We Collect</h4>
                    <span class="mb-3">
                        •⁠ ⁠Full name, email, phone number, age (optional)
                    </span>

                    <span class="mb-3">
                        •⁠  ⁠Payment details (processed securely via third-party gateway such as Flutterwave)
                    </span>

                    <span class="mb-3">
                        •⁠  ⁠User progress data and participation
                    </span>

                </div>

                <div class="mt-3">
                    <h4 class="mb-3">2. How We Use Your Information</h4>
                    <span class="mb-3">
                        •⁠  ⁠To deliver course content and track progress
                    </span>

                    <span class="mb-3">
                        •⁠  ⁠To process payments and send confirmations
                    </span>

                    <span class="mb-3">
                        •⁠  ⁠To send updates, reminders, or support messages
                    </span>
                </div>



                <div class="mt-3">
                    <h4 class="mb-3">3.  Data Protection</h4>
                    <span class="mb-3">
                        We store your data securely and do not sell or share your personal information with third parties without consent.
                    </span>
                </div>


                <div class="mt-3">
                    <h4 class="mb-3">4. Use of Cookies</h4>
                    <span class="mb-3">
                        We may use cookies for analytics and performance improvements on our platform
                    </span>
                </div>


                <div class="mt-3">
                    <h4 class="mb-3">5. Your Rights</h4>
                    <span class="mb-3">
                        You may request to update or delete your information at any time by contacting our support team.
                    </span>

                    <span class="mb-3">
                        •⁠  ⁠Avoid sharing offensive or harmful content.
                    </span>

                    <span class="mb-3">
                        •⁠  ⁠Respect other participants and the instructional team.
                    </span>
                </div>

                <div class="mt-3">
                    <h4 class="mb-3">6. Limitation of Liability</h4>
                    <span class="mb-3">
                        We do not guarantee specific academic results or professional outcomes. The program is a developmental tool designed to enhance learning potential.                    </span>
                </div>

                <div class="mt-3">
                    <h4 class="mb-3">7. Amendments</h4>
                    <span class="mb-3">
                        We reserve the right to update these terms at any time. Continued use of the platform constitutes acceptance of any changes.
                        </span>
               </div>


               </template>


               <template v-if="isfilltap == 'refund'">

                <!-- third -->


                <div class="mt-3">
                    <h4 class="mb-3"> We offer a transparent and simple refund policy:
                    </h4>
                    <span class="mb-3">
                        •⁠  ⁠All registration payments are final and non-refundable* due to instant access to premium educational content.
                    </span>

                    <span class="mb-3">
                        •⁠  ⁠All registration payments are final and non-refundable* due to instant access to premium educational content.
                    </span>

                </div>

                <div class="mt-3">
                    <h4 class="mb-3">2.  USER AGREEMENT
                    </h4>
                    <span class="mb-3">
                        •⁠  ⁠Use the platform responsibly and respectfully.
                    </span>

                    <span class="mb-3">
                        •⁠  ⁠Avoid downloading, copying, or distributing any proprietary content.
                    </span>

                    <span class="mb-3">
                        •⁠  ⁠Avoid downloading, copying, or distributing any proprietary content.
                    </span>
                </div>



                <div class="mt-3">
                    <span class="mb-3">
                        Violation of this agreement may result in revoked access without refund.
                    </span>
                </div>

               </template>



            </div>
        </div>
    </div>
</template>