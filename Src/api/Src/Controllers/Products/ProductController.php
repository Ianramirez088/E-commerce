<?php
	require_once '../../Src/Models/Product.php';
	require_once '../../Src/Services/ProductService.php';

	class ProductController
	{
		protected $id, $category, $name, $description, $price;

		public function __construct($category = '', $name = '', $description = '', $price = '', $id = '') {
			$this->id= $id;
			$this->category = $category;
			$this->name = $name;
			$this->price = $price;
			$this->description = $description;
		}

		public function createProductController() : array {
			$product = new Product;
			$product->setCategory($this->category)
					->setName($this->name)
					->setDescription($this->description)
					->setPrice($this->price);
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
					->setPrice($this->price);
			$productService = new ProductService();

			return $productService->update($product);
		}

		public function deleteProductController() : array {
			$productService = new ProductService();

			return $productService->destroy((int) $this->id);
		}
	}
	

?>