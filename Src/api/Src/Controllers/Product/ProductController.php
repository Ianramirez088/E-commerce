<?php
	require_once '../../Src/Models/Product/Product.php';
	require_once '../../Src/Services/Product/ProductService.php';

	class ProductController
	{
		protected $id, $category, $name, $description, $price, $stock;

		public function __construct($stock = 0, $category = '', $name = '', $description = '', $price = 0, $id = '') {
			$this->id= $id;
			$this->category = $category;
			$this->name = $name;
			$this->price = $price;
			$this->stock = $stock;
			$this->description = $description;
		}

		public function createProductController() : array {
			$product = new Product;
			$product->setCategory($this->category)
					->setName($this->name)
					->setDescription($this->description)
					->setPrice($this->price)
					->setState('A')
					->setStock($this->stock);
			$productService = new ProductService();

			return $productService->store($product);
		}

		public function showProductController() : array {
			$productService = new ProductService();
			return $productService->show();
		}

		public function updateProductController() : array {
			$product = new Product;
			$product->setId($this->id)
					->setCategory($this->category)
					->setName($this->name)
					->setDescription($this->description)
					->setPrice($this->price)
					->setStock($this->stock);
			$productService = new ProductService();

			return $productService->update($product);
		}

		public function deleteProductController() : array {
			$productService = new ProductService();

			return $productService->destroy((int) $this->id);
		}
	}
	

?>