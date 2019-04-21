require('./bootstrap');

window.Vue = require('vue');

Vue.component('my-post-component', require('./components/MyPostComponent.vue').default);
Vue.component('form-component', require('./components/FormComponent.vue').default);
Vue.component('post-component', require('./components/PostComponent.vue').default);

const app = new Vue({
    el: '#app'
});
