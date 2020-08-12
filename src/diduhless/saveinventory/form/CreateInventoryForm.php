<?php

declare(strict_types=1);


namespace diduhless\saveinventory\form;


use EasyUI\variant\SimpleForm;
use pocketmine\inventory\PlayerInventory;

class CreateInventoryForm extends SimpleForm {

    /** @var PlayerInventory */
    private $inventory;

    public function __construct(PlayerInventory $inventory) {
        $this->inventory = $inventory;
        parent::__construct("Save Your Inventory");
    }

}