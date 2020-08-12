<?php

declare(strict_types=1);


namespace diduhless\saveinventory\form;


use EasyUI\element\Button;
use EasyUI\variant\SimpleForm;
use pocketmine\Player;

class InventoryOptionsForm extends SimpleForm {

    public function __construct() {
        parent::__construct("Inventory Options");
    }

    protected function onCreation(): void {
        $this->addSaveInventoryButton();
        $this->addViewInventoriesButton();
    }

    private function addSaveInventoryButton(): void {
        $button = new Button("Save your inventory");
        $button->setSubmitListener(function(Player $player) {
            $player->sendForm(new CreateInventoryForm($player->getInventory()));
        });
        $this->addButton($button);
    }

    private function addViewInventoriesButton(): void {
        $button = new Button("View your inventories");
        $button->setSubmitListener(function(Player $player) {
            $player->sendForm(new SavedInventoriesForm());
        });
        $this->addButton($button);
    }

}