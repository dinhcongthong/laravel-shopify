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

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});



let html = '<li class="grid__item">';
    html += '<link href="//cdn.shopify.com/s/files/1/0557/7641/1733/t/1/assets/component-rating.css?v=2457308526394124043" rel="stylesheet" type="text/css" media="all">';
    html += '<div class="card-wrapper underline-links-hover">';
    html += '    <div class="card card--standard card--media" style="--ratio-percent: 56.28571428571428%;">';
    html += '        <div class="card__inner color-background-2 ratio" style="--ratio-percent: 56.28571428571428%;">';
    html += '            <div class="card__media">';
    html += '                <div class="media media--transparent media--hover-effect">';
    html += '                    <img srcset="//cdn.shopify.com/s/files/1/0557/7641/1733/products/tiger_pose_predator_267781_1920x1080_350x350_fa528b6e-3f07-438f-aac2-d6389e8b2522.jpg?v=1649401946&amp;width=165 165w,//cdn.shopify.com/s/files/1/0557/7641/1733/products/tiger_pose_predator_267781_1920x1080_350x350_fa528b6e-3f07-438f-aac2-d6389e8b2522.jpg?v=1649401946 350w"';
    html += '                           src="//cdn.shopify.com/s/files/1/0557/7641/1733/products/tiger_pose_predator_267781_1920x1080_350x350_fa528b6e-3f07-438f-aac2-d6389e8b2522.jpg?v=1649401946&amp;width=533"';
    html += '                           sizes="(min-width: 1200px) 267px, (min-width: 990px) calc((100vw - 130px) / 4), (min-width: 750px) calc((100vw - 120px) / 3), calc((100vw - 35px) / 2)"';
    html += '                           alt="Tiger 109" class="motion-reduce" loading="lazy" width="350" height="197">';
    html += '                </div>';
    html += '            </div>';
    html += '            <div class="card__content">';
    html += '                <div class="card__information">';
    html += '                    <h3 class="card__heading">';
    html += '                        <a href="/products/tiger-149" class="full-unstyled-link">';
    html += '                               Tiger 109';
    html += '                        </a>';
    html += '                    </h3>';
    html += '                </div>';
    html += '                <div class="card__badge bottom left"></div>';
    html += '            </div>';
    html += '        </div>';
    html += '        <div class="card__content">';
    html += '            <div class="card__information">';
    html += '                <h3 class="card__heading h5">';
    html += '                    <a href="/products/tiger-149" class="full-unstyled-link">';
    html += '                           Tiger 109';
    html += '                    </a>';
    html += '                </h3>';
    html += '                <div class="card-information"><span class="caption-large light"></span>';
    html += '                    <div class="price ">';
    html += '                        <div class="price__container">';
    html += '                            <div class="price__regular">';
    html += '                                <span class="visually-hidden visually-hidden--inline">Regular price</span>';
    html += '                                <span class="price-item price-item--regular">';
    html += '                                       0 VND';
    html += '                                </span>';
    html += '                            </div>';
    html += '                            <div class="price__sale">';
    html += '                                <span class="visually-hidden visually-hidden--inline">Regular price</span>';
    html += '                                <span>';
    html += '                                    <s class="price-item price-item--regular"></s>';
    html += '                                </span><span class="visually-hidden visually-hidden--inline">Sale price</span>';
    html += '                                <span class="price-item price-item--sale price-item--last">';
    html += '                                       0 VND';
    html += '                                </span>';
    html += '                            </div>';
    html += '                            <small class="unit-price caption hidden">';
    html += '                                <span class="visually-hidden">Unit price</span>';
    html += '                                <span class="price-item price-item--last">';
    html += '                                    <span></span>';
    html += '                                    <span aria-hidden="true">/</span>';
    html += '                                    <span class="visually-hidden">&nbsp;per&nbsp;</span>';
    html += '                                    <span>';
    html += '                                    </span>';
    html += '                                </span>';
    html += '                            </small>';
    html += '                        </div>';
    html += '                    </div>';
    html += '                </div>';
    html += '            </div>';
    html += '            <div class="card__badge bottom left"></div>';
    html += '        </div>';
    html += '    </div>';
    html += '</div>';
    html += '</li>';