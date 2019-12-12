import Vue from "vue";
import VueRouter from "vue-router";
//import VueSweetalert from 'vue-sweetalert';
import {VueSpinners} from '@saeris/vue-spinners';
import {VueAutosuggest} from 'vue-autosuggest';
import VueBootstrapTypeahead from 'vue-bootstrap-typeahead';




import VueSweetalert2 from 'vue-sweetalert2';
import columnSortable from 'vue-column-sortable'
import VueSimpleAlert from "vue-simple-alert";
import AlertPlugin from 'bootstrap-vue'

Vue.use(AlertPlugin)
Vue.use(VueSimpleAlert);
Vue.use(columnSortable)

Vue.use(columnSortable, {
    showIcon: true,
  });
//for a single instance


import OrganizationChart from 'vue-organization-chart';
import 'vue-organization-chart/dist/orgchart.css';
import VueCurrencyFilter from 'vue-currency-filter';



/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');
Vue.use(VueSweetalert2);
Vue.use(VueSpinners);
Vue.use(OrganizationChart);
Vue.use(VueAutosuggest);
Vue.use(VueRouter);
Vue.use(VueCurrencyFilter,
    {
        symbol: '',
        thousandsSeparator: ',',
        fractionCount: 0,
        fractionSeparator: '.',
        symbolPosition: 'front',
        symbolSpacing: true
    });
Vue.component('vue-bootstrap-typeahead', VueBootstrapTypeahead);


window.Vue = require('vue');
Vue.component('pagination', require('laravel-vue-pagination'));


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('jumuiya-component', require('./components/JumuiyaComponent.vue'));
Vue.component('family-component', require('./components/FamilyComponent.vue'));
Vue.component('member-component', require('./components/MemberComponent.vue'));
Vue.component('vigango-component', require('./components/vigangoComponent.vue'));
Vue.component('mitaa-component', require('./components/MitaaComponent.vue'));
Vue.component('all-member-component', require('./components/allMemberComponent.vue'));
Vue.component('manage-michango-component', require('./components/manageMichango.vue'));
Vue.component('member-donation-component', require('./components/memberDComponent.vue'));
Vue.component('family-donation-component', require('./components/familyDcomponent.vue'));
Vue.component('jumuiya-donation-component', require('./components/jumuiyaDcomponent.vue'));
Vue.component('mtaa-donation-component', require('./components/mtaaDcomponent.vue'));
Vue.component('kigango-donation-component', require('./components/kigangoDcomponent.vue'));
// matoleo Library
Vue.component('matoleo-library-component', require('./components/MatoleoLibraryComponent.vue'));

// Donations
Vue.component('report-donation-component', require('./components/ReportDonationComponent.vue'));
Vue.component('report-component', require('./components/report_donation.vue'));

Vue.component('member_report-component', require('./components/Member_ReportComponent.vue'));

// contact
Vue.component('contact-component', require('./components/contactComponent.vue'));
Vue.component('add-contact-component', require('./components/contact_addComponent.vue'));









const app = new Vue({
    el: '#app'

});
