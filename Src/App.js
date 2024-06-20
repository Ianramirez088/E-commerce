"use strict";

// const { toRef } = Vue;
// const { useStore } = Vuex;
// const { useRouter } = VueRouter;

const App = {
	name: "App",
	components: { },
	setup() {
		return {  }
	},
	/*html*/
	template: `
		<transition name="fade" mode="out-in" appear>
			<container/>
		</transition>
	`,
};


export default App;
