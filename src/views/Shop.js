"use strict";
const { useStore  } = Vuex;
const { toRef, onMounted } = Vue;

const Shop = {
	name: "Shop",
	components: {},
	setup() {
		const store = useStore();

		return {}
	},
	/*html*/
	template: `
		<h1>Shop</h1>
	`,
};

export default Shop;
