/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.prototype.$user = window.User;
Vue.prototype.$asset = window._asset;

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('outline-button', require('./components/OutlineButton.vue').default);

Vue.component('fill-button', require('./components/FillButton.vue').default);

Vue.component('become-creator', require('./components/BecomeCreator.vue').default);

Vue.component('my-podcasts', require('./components/MyPodcasts.vue').default);

Vue.component('new-podcast', require('./components/NewPodcast.vue').default);

Vue.component('text-input', require('./components/TextInput.vue').default);

Vue.component('select-input', require('./components/SelectInput.vue').default);

Vue.component('podcast-row', require('./components/PodcastRow.vue').default);

Vue.component('edit-podcast', require('./components/EditPodcast.vue').default);

Vue.component('edit-podcast-info', require('./components/EditPodcastInfo.vue').default);

Vue.component('new-episode', require('./components/NewEpisode.vue').default);

Vue.component('edit-episode', require('./components/EditEpisode.vue').default);

Vue.component('drop-file', require('./components/DropFile.vue').default);

Vue.component('creator-episode-card', require('./components/CreatorEpisodeCard.vue').default);

Vue.component('subscriptions', require('./components/Subscriptions.vue').default);

Vue.component('podcast-details', require('./components/PodcastDetails.vue').default);

Vue.component('episode-row', require('./components/EpisodeRow.vue').default);

Vue.component('discover', require('./components/Discover.vue').default);

Vue.component('category-card', require('./components/CategoryCard.vue').default);

Vue.component('category-pods', require('./components/CategoryPods.vue').default);

Vue.component('query-pods', require('./components/QueryPods.vue').default);

Vue.component('search-bar', require('./components/SearchBar.vue').default);

Vue.component('home', require('./components/Home.vue').default);

Vue.component('podcast-card', require('./components/PodcastCard.vue').default);

Vue.component('popular-card', require('./components/PopularCard.vue').default);

Vue.component('landing-page', require('./components/LandingPage.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
