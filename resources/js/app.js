/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

require('cropit');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */




window.$(document).ready(function () {

    // Cropit
    if ($('#image-cropper').length > 0) {
        $('#image-cropper').cropit({
            imageBackground: true
        });
        $('#image-cropper').cropit('imageSrc', $('.cropit-target').val())
        $('.cropit-trigger').on('click', function (e) {
            $('.cropit-target').val($('#image-cropper').cropit('export'))
        })
    }



    // Currency input mask
    $('.currency-mask').inputmask("numeric", {
        groupSeparator: ",",
        // digits: 0,
        autoGroup: true,
        rightAlign: false,
        removeMaskOnSubmit: true
    })

    // Slug
    $('.slugify').on('keyup', function () {
        var a = 'àáäâèéëêìíïîòóöôùúüûñçßÿœæŕśńṕẃǵǹḿǘẍźḧ·/_,:;'
        var b = 'aaaaeeeeiiiioooouuuuncsyoarsnpwgnmuxzh------'
        var p = new RegExp(a.split('').join('|'), 'g')

        var val =  $(this).val().toString().toLowerCase()
                    // .replace(/\s+/g, '-')           // Replace spaces with -
                    .replace(p, c => b.charAt(a.indexOf(c)))     // Replace special chars
                    .replace(/&/g, '-and-')         // Replace & with 'and'
                    .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
                    .replace(/\-\-+/g, '-')         // Replace multiple - with single -
                    .replace(/^-+/, '')             // Trim - from start of text
                    .replace(/-+$/, '')
        $(this).val(val)
    })
})
