<?php
	require_once '../../Src/Models/Sales/Sale.php';
	require_once '../../Src/Services/Sales/SaleService.php';

	class SaleController
	{
		public function createSaleController(string $consecutive, int $quantity, int $totalValue, int $person, int $product, string $state) : array {
			$sale = new Sale;
			$sale->setConsecutive($consecutive)
					->setQuantity($quantity)
					->setTotalValue($totalValue)
					->setPerson($person)
					->setProduct($product)
					->setState($state);
			$saleService = new SaleService();

			return $saleService->store($sale);
		}

		public function showSaleController() : array {
			$saleService = new SaleService();
			return $saleService->show();
		}

		public function updateSaleController(int $id, string $consecutive, int $quantity, int $totalValue, int $person, int $product, string $state) : array {
			$sale = new Sale;
			$sale->setId($id)
					->setConsecutive($consecutive)
					->setQuantity($quantity)
					->setTotalValue($totalValue)
					->setPerson($setPerson)
					->setProduct($product)
					->setState($state);
			$saleService = new SaleService();

			return $saleService->update($sale);
		}

		public function deleteSaleController(int $id) : array {
			$saleService = new SaleService();

			return $saleService->destroy((int) $id);
		}
	}
	

?>