<?php

declare(strict_types=1);


namespace diduhless\saveinventory\form;


use diduhless\saveinventory\utils\InventoryUtils;
use EasyUI\element\Button;
use EasyUI\variant\SimpleForm;
use pocketmine\Player;
use pocketmine\utils\TextFormat;

class InventoryMenuForm extends SimpleForm {
    use InventoryUtils;

    public function __construct() {
        parent::__construct("Inventory Menu");
    }

    protected function onCreation(): void {
        $this->addSaveInventoryButton();
        $this->addViewInventoriesButton();
    }

    private function addSaveInventoryButton(): void {
        $button = new Button("Save your inventory");
        $button->setSubmitListener(function(Player $player) {
            $player->sendForm(new SaveInventoryForm($player->getInventory()));
        });
        $this->addButton($button);
    }

    private function addViewInventoriesButton(): void {
        $button = new Button("View your inventories");
        $button->setSubmitListener(function(Player $player) {
            $inventory_names = $this->getAllInventoryNames($player);
            if(!empty($inventory_names)) {
                $player->sendForm(new ViewInventoriesForm($inventory_names));
            } else {
                $player->sendMessage(TextFormat::RED . "You don't have any inventories!");
            }
        });
        $this->addButton($button);
    }

}