<?php
namespace Model\Interfaces;

use Model\Table\Listings;
interface ListingsTableAwareInterface
{
	public function setListingsTable(Listings $table);
}
