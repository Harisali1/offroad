import Vue from 'vue';
import VueAlertify from 'vue-alertify';
import CKEditor from 'ckeditor4-vue';
import Select2 from 'v-select2-component';
import VueSweetalert2 from 'vue-sweetalert2';

// If you don't need the styles, do not connect
import 'sweetalert2/dist/sweetalert2.min.css';

Vue.use(VueSweetalert2);

Vue.use(VueAlertify);
Vue.use(CKEditor);
Vue.component('select2', Select2);
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
//Chunks
//Addon
const addAddon = () => import(/*webpackChunkName:"addCategory"*/'./components/backend/addon/Add');
const editAddon = () => import(/*webpackChunkName:"addCategory"*/'./components/backend/addon/Edit');
//Chunks
const addCategory = () => import(/*webpackChunkName:"addCategory"*/'./components/backend/category/Add');
const editCategory = () => import(/*webpackChunkName:"editCategory"*/'./components/backend/category/Edit');
const addBrand = () => import(/*webpackChunkName:"addBrand"*/'./components/backend/brand/Add');
const editBrand = () => import(/*webpackChunkName:"editBrand"*/'./components/backend/brand/Edit');
const addPage = () => import(/*webpackChunkName:"addPage"*/'./components/backend/page/Add');
const editPage = () => import(/*webpackChunkName:"editPage"*/'./components/backend/page/Edit');
const addAdmin = () => import(/*webpackChunkName:"addAdmin"*/'./components/backend/admin/Add');
const editAdmin = () => import(/*webpackChunkName:"editAdmin"*/'./components/backend/admin/Edit');
const addCustomer = () => import(/*webpackChunkName:"addCustomer"*/'./components/backend/customer/Add');
const editCustomer = () => import(/*webpackChunkName:"editCustomer"*/'./components/backend/customer/Edit');
//Coupon
const addCoupon = () => import(/*webpackChunkName:"addCoupon"*/'./components/backend/coupon/Add');
const editCoupon = () => import(/*webpackChunkName:"editCoupon"*/'./components/backend/coupon/Edit');
//Smart Assistant
const addSmartAssistant = () => import(/*webpackChunkName:"addSmartAssistant"*/'./components/backend/smart-assistant/Add');
const editSmartAssistant = () => import(/*webpackChunkName:"editSmartAssistant"*/'./components/backend/smart-assistant/Edit');
//Attributes
//Make
const addMake = () => import(/*webpackChunkName:"addMake"*/'./components/backend/attributes/make/Add');
const editMake = () => import(/*webpackChunkName:"editMake"*/'./components/backend/attributes/make/Edit');
//Model
const addModel = () => import(/*webpackChunkName:"addModel"*/'./components/backend/attributes/model/Add');
const editModel = () => import(/*webpackChunkName:"editModel"*/'./components/backend/attributes/model/Edit');
//Year
const addYear = () => import(/*webpackChunkName:"addYear"*/'./components/backend/attributes/year/Add');
const editYear = () => import(/*webpackChunkName:"editYear"*/'./components/backend/attributes/year/Edit');
//Color
const addColor = () => import(/*webpackChunkName:"addColor"*/'./components/backend/attributes/color/Add');
const editColor = () => import(/*webpackChunkName:"editColor"*/'./components/backend/attributes/color/Edit');
//Mileage
const addMileage = () => import(/*webpackChunkName:"addMileage"*/'./components/backend/attributes/mileage/Add');
const editMileage = () => import(/*webpackChunkName:"editMileage"*/'./components/backend/attributes/mileage/Edit');

Vue.component('addCategory', addCategory);
Vue.component('editCategory', editCategory);
Vue.component('addAddon', addAddon);
Vue.component('editAddon', editAddon);
Vue.component('addBrand', addBrand);
Vue.component('editBrand', editBrand);
Vue.component('addPage', addPage);
Vue.component('editPage', editPage);
Vue.component('addAdmin', addAdmin);
Vue.component('editAdmin', editAdmin);
Vue.component('addCustomer', addCustomer);
Vue.component('editCustomer', editCustomer);
Vue.component('addCoupon', addCoupon)
Vue.component('editCoupon', editCoupon)
Vue.component('addSmartAssistant', addSmartAssistant)
Vue.component('editSmartAssistant', editSmartAssistant)
Vue.component('addMake', addMake)
Vue.component('editMake', editMake)
Vue.component('addModel', addModel)
Vue.component('editModel', editModel)
Vue.component('addColor', addColor)
Vue.component('editColor', editColor)
Vue.component('addYear', addYear)
Vue.component('editYear', editYear)
Vue.component('addMileage', addMileage)
Vue.component('editMileage', editMileage)

const app = new Vue({
    el: '#backend-app',
});
