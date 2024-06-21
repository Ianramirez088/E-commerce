"use strict";

const { toRef } = Vue;
const { useStore } = Vuex;
const { useRouter } = VueRouter;

import ViewsContainers from './components/ViewsContainers.js';

const App = {
	name: "App",
	components: { ViewsContainers },
	setup() {
		return {  }
	},
	/*html*/
	template: `
		<transition name="fade" mode="out-in" appear>
			<views-containers></views-containers>
		</transition>
	`,
};


export default App;
