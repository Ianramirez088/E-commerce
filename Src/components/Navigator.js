"use strict";

const { ref, toRef } = Vue;
const { useStore } = Vuex;

const Navigator = {
	name: "Navigator",
	setup() {
		const store = useStore();
		
		return {  };
	},
	/*html*/
	template: `
		<transition name="fade" mode="out-in" appear>
			<div>
				<nav class="navbar navbar-expand navbar-dark bg-dark">
					<a class="navbar-brand" href="#">
						<img src="" alt="" width="30" height="30" class="d-inline-block align-top">
					</a>
					<div class="table-responsive ms-auto">
						<div class="navbar-nav">
							<router-link to="/" class="nav-link">Tienda</router-link>
							<router-link to="/sales" class="nav-link">Ventas</router-link>
							<router-link to="/products" class="nav-link">Products</router-link>
						</div>
					</div>
				</nav>
			</div>
		</transition>
	`,
};

export default Navigator;
