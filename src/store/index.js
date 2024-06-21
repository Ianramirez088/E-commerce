"use strict";

const { Store } = Vuex;

import { app, api, baseUrl } from "../config.js";

const store = new Store({
	state: () => ({
		product: {
			category: '',
			name: '',
			price: 0,
			stock: 0,
			description: ''
		},
		customer: {
			names: '',
			surNames: '',
			phone: '',
			email: '',
			address: ''
		},
		order: {
			names: '',
			product: 0,
			quantity: '',
			customer: '',
			address: '',
			totalValue: 0
		},
		listProducts: []
	}),

	mutations: {
		setListProducts(state, data) {
			console.log(data)
			state.listProducts = data;
		}
	},

	actions: {
		async createProduct({ state, commit }) {
			let params = {
				'option': 'create',
				product: state.product
			}
			let req = await fetch(`${api}Product/route.php`, {
				mode: 'no-cors',
				method: 'POST',
				body: JSON.stringify(params)
			});
		},

		async searchCustomer({ state, commit }) {
			let params = {
				'option': 'read'
			}
			let req = await fetch(`${api}Customer/route.php?${JSON.stringify(params)}`, {
				mode: 'no-cors',
				method: 'GET',
				body: JSON.stringify(params)
			});
		},

		async searchProducts({ state, commit }) {
			let req = await fetch(`${api}Product/route.php?option=read`, {
				mode: 'cors',
				method: 'GET',
				headers: {
					Accept: "application/json",
					'Content-Type':'application/json'
				}
			});

			req = await req.json();

			if(req[0].state == 'Successful response') {
				commit("setListProducts", req[0].Response);
			}
		},

		async createCustomer({ state, commit }) {
			let params = {
				'option': 'create',
				customer: state.customer
			}
			let req = await fetch(`${api}Customer/route.php`, {
				mode: 'no-cors',
				method: 'POST',
				body: JSON.stringify(params)
			});
		}
	},
	// modules: {},
});

export default store;
