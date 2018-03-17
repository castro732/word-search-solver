
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });


$('#soup').on('change', function() {
	// Hide all soups
	for (var i = 1; i < 5; i++) {
		$('[data-soup='+i+']').hide();
	}
	// Show selected soup
	$('[data-soup='+this.value+']').show();
});

$('#submit').on('click', function() {
	axios.post(`/solve/${$('#soup').val()}/${$('#word').val()}`)
	.then(function (response) {
		if (response.data.found > 0) {
			$('#times_found').html(response.data.found);
			$('#found').show();
			$('#not_found').hide();
		} else {
			$('#found').hide();
			$('#not_found').show();
		}
	})
})
