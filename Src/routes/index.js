"use strict";

const { createRouter, createMemoryHistory } = VueRouter;

import { app } from "../config.js";

const router = new createRouter({
	history: createMemoryHistory(`appbl/${app}/public/`),
	routes: [
		{
			path: "/",
			name: "Products",
			component: () => import("../views/Products.js"),
			meta: { requireAuth: true },
		},
		{
			path: "/shop",
			name: "Shop",
			component: () => import("../views/Shop.js"),
			meta: { requireAuth: false },
		},
		{
			path: "/sales",
			name: "Sales",
			component: () => import("../views/Sales.js"),
			meta: { requireAuth: true },
		},
		{
			path: "/customers",
			name: "Customers",
			component: () => import("../views/Customers.js"),
			meta: { requireAuth: true },
		},
		{
			path: "/:pathMatch(.*)",
			name: "PageNotFound",
			component: () => import("../views/PageNotFound.js"),
			meta: { requireAuth: false },
		},
	],
});

export default router;
