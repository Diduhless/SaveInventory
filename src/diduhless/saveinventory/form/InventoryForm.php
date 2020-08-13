<?php

declare(strict_types=1);


namespace diduhless\saveinventory\form;


use diduhless\saveinventory\utils\InventoryUtils;
use EasyUI\element\Button;
use EasyUI\variant\SimpleForm;
use pocketmine\Player;
use pocketmine\utils\TextFormat;

class InventoryForm extends SimpleForm {
    use InventoryUtils;

    /** @var string */
    private $inventory_name;

    public function __construct(string $inventory_name) {
        $this->inventory_name = $inventory_name;
        parent::__construct($inventory_name . " Inventory", "What do you want to do with this inventory?");
    }

    protected function onCreation(): void {
        $this->addEquipButton();
        $this->addDeleteButton();
    }

    private function addEquipButton(): void {
        $button = new Button("Equip");
        $button->setSubmitListener(function(Player $player) {
            $player->getInventory()->setContents($this->getInventoryContents($player, $this->inventory_name));
            $player->sendMessage(TextFormat::GREEN . "You have equipped the inventory " . TextFormat::WHITE . $this->inventory_name . TextFormat::GREEN . "!");
        });
        $this->addButton($button);
    }

    private function addDeleteButton(): void {
        $button = new Button("Delete");
        $button->setSubmitListener(function(Player $player) {
            $this->removeInventory($player, $this->inventory_name);
            $player->sendMessage(TextFormat::GREEN . "You have deleted the inventory " . TextFormat::WHITE . $this->inventory_name . TextFormat::GREEN . "!");
        });
        $this->addButton($button);
    }

}