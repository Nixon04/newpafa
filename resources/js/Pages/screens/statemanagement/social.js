import { defineStore } from "pinia";
import {ref} from 'vue';

export const SocialState = defineStore('all_stores', () => {

    const sociallinks = ref([
        {
            'id': '1',
            'name': 'Facebook',
            'link': 'https://facebook.com',
        },
        {
            'id': '2',
            'name': 'X(Formally Twitter)',
            'link': 'https://twitter.com',
        },
        {
            'id': '3',
            'name': 'Instagram',
            'link': 'https://instagram.com',
        }
    ]);


    const main = ref([
        {
            'id': '1',
            'name': 'WhatsApp',
            'link': 'https://whatsapp.com',
        },
        
    ]);

    return {
        sociallinks,
        main,
    }

});