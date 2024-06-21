"use strict";

const { toRef } = Vue;
const { useStore } = Vuex;

const Customers = {
	name: "Customers",
	setup() {
		const store = useStore();
		let customer = toRef(store.state, "customer");
		let createCustomer = async () => await store.dispatch("createCustomer");

		return { customer, createCustomer };
	},
	/*html*/
	template: `
		<div class="container">
			<h1>Crear Cliente</h1>
			<form>
				{{ customer }}
				<div class="mb-3">
					<label for="exampleInputPassword1" class="form-label">Nombres</label>
					<input v-model="customer.names" type="text" class="form-control" id="exampleInputPassword1">
				</div>
				<div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">Apellidos</label>
					<input v-model="customer.surNames" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

				</div>
				<div class="mb-3">
					<label for="exampleInputPassword1" class="form-label">Telefono</label>
					<input v-model="customer.phone" type="number" class="form-control" id="exampleInputPassword1">
				</div>
				<div class="mb-3">
					<label for="exampleInputPassword1" class="form-label">Email</label>
					<input v-model="customer.email" type="text" class="form-control" id="exampleInputPassword1">
				</div>
				<button @click="createCustomer" type="button" class="btn btn-primary">Crear</button>
			</form>
		</div>
	`,
};

export default Customers;
