import './bootstrap';

import 'vue-multiselect/dist/vue-multiselect.min.css';
import flatPickr from 'vue-flatpickr-component';
import VueQuillEditor from 'vue-quill-editor';
import Notifications from 'vue-notification';
import Multiselect from 'vue-multiselect';
import VeeValidate from 'vee-validate';
import 'flatpickr/dist/flatpickr.css';
import VueCookie from 'vue-cookie';
import { Admin } from 'craftable';
import VModal from 'vue-js-modal'
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
import Vue from 'vue';

import './app-components/bootstrap';
import './index';



import 'craftable/dist/ui';

Vue.component('multiselect', Multiselect);
Vue.component('chart-component', require('../components/ChartComponent.vue').default);
Vue.use(VeeValidate, { strict: true });
Vue.component('datetime', flatPickr);
Vue.use(VModal, { dialog: true, dynamic: true, injectModalsContainer: true });
Vue.use(VueQuillEditor);
Vue.use(Notifications);
Vue.use(VueCookie);

Vue.use(Loading, {
    isFullPage: true,
    backgroundColor: '#000',
    opacity: 0.7,
    zIndex: 9999999,
    loader: 'dots',
    color: '#fff',
    width: 70,
    height: 70,
})

new Vue({
    mixins: [Admin],
});
