"use strict";

import Navigator from "./Navigator.js";

const { toRef } = Vue;
const { useStore } = Vuex;

const Container = {
	name: "Container",
	components: { Navigator },
	setup() {
		const store = useStore();
		const session = toRef(store.state, "session");
		return { session };
	},
	/*html*/
	template: `
		<div>
			<navigator />
			<router-view />
		</div>
	`,
};

export default Container;
