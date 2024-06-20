"use strict";

const { toRef } = Vue;
const { useStore } = Vuex;

const Products = {
	name: "Products",
	setup() {
		const store = useStore();
		const router = useRouter();

		return { };
	},
	/*html*/
	template: `
		<h1>Products</h1>
	`,
};

export default Products;
