"use strict";

const { useStore  } = Vuex;
const { toRef } = Vue;

const Sales = {
	name: "Sales",
	setup() {
		const store = useStore();

		return {  }
	},
	/*html*/
	template: `
		<h1>Sales</h1>
	`,
};

export default Sales;
