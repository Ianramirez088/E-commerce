"use strict";

const { toRef, ref } = Vue;
const { useStore } = Vuex;

const ShowProducts = {
	name: "ShowProducts",
	setup() {
		const store = useStore();
		let listProducts = toRef(store.state, "listProducts");
        let quantity = ref(0);
        
		return { listProducts, quantity };
	},
	/*html*/
	template: `
		<div class="container">
          <table class="table table-hover table-stripped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Categoria</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">precio</th>
                        <th scope="col">Carrito</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in listProducts" :key="index">
                        <td>{{ item.category }}</td>
                        <td>{{ item.name }}</td>
                        <td>{{ item.description }}</td>
                        <td>{{ item.price }}</td>
                        <td>
                            <button @click="quantity++;" class="btn btn-primary fs-4">+</button>
                            <button @click="quantity--;" class="btn btn-danger fs-4">-</button>
                        </td>
                    </tr>
                </tbody>
            </table>
	`,
};

export default ShowProducts;
