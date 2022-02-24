require('./bootstrap');


import { createApp } from 'vue';
import MainComponent from './components/Main';


createApp({
  components: { MainComponent }
}).mount('#app');
