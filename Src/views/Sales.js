"use strict";

const { useStore  } = Vuex;
const { toRef, onMounted } = Vue;

import ShowProducts from '../components/products/ShowProducts.js';

const Sales = {
	name: "Sales",
	components: { ShowProducts },
	setup() {
		const store = useStore();
		let searchProducts = async () => await store.dispatch("searchProducts");
		let listProducts = toRef(store.state, "listProducts");

		onMounted(() => searchProducts());

		return { listProducts }
	},
	/*html*/
	template: `
		<h1>Sales</h1>
		<show-products></show-products>
	`,
};

export default Sales;
