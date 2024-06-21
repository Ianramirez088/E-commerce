"use strict";

const { toRef } = Vue;
const { useStore } = Vuex;

const Products = {
	name: "Products",
	setup() {
		const store = useStore();
		let product = toRef(store.state, "product");
		let createProduct = async () => await store.dispatch("createProduct");

		return { product, createProduct };
	},
	/*html*/
	template: `
		<div class="container">
			<h1>Crear producto</h1>
			<form>
				<div class="mb-3">
					<label for="exampleInputPassword1" class="form-label">Categoria del producto</label>
					<input v-model="product.category" type="text" class="form-control" id="exampleInputPassword1">
				</div>
				<div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">Nombre</label>
					<input v-model="product.name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

				</div>
				<div class="mb-3">
					<label for="exampleInputPassword1" class="form-label">Precio</label>
					<input v-model="product.price" type="number" class="form-control" id="exampleInputPassword1">
				</div>
				<div class="mb-3">
					<label for="exampleInputPassword1" class="form-label">Stock</label>
					<input v-model="product.stock" type="number" class="form-control" id="exampleInputPassword1">
				</div>
				<div class="mb-3">
					<label for="exampleInputPassword1" class="form-label">Descripcion</label>
					<input v-model="product.description" type="text" class="form-control" id="exampleInputPassword1">
				</div>
				<button @click="createProduct" type="button" class="btn btn-primary">Crear</button>
			</form>
		</div>
	`,
};

export default Products;
