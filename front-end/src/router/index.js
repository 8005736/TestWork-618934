import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import ProductForm from '../views/ProductForm.vue'

Vue.use(VueRouter)

const routes = [
	{
		path: '/',
		name: 'home',
		component: Home
	}, {
		path: '/product-create',
		name: 'product-create',
		component: ProductForm
	}, {
		path: '/product/:id',
		name: 'product',
		component: ProductForm
	}
]

const router = new VueRouter({
	mode: 'history',
	base: process.env.BASE_URL,
	routes
})

export default router
