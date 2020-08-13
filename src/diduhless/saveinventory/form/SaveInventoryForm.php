<?php

declare(strict_types=1);


namespace diduhless\saveinventory\form;


use diduhless\saveinventory\utils\InventoryUtils;
use EasyUI\element\Input;
use EasyUI\utils\FormResponse;
use EasyUI\variant\CustomForm;
use pocketmine\inventory\PlayerInventory;
use pocketmine\Player;
use pocketmine\utils\TextFormat;

class SaveInventoryForm extends CustomForm {
    use InventoryUtils;

    /** @var PlayerInventory */
    private $inventory;

    public function __construct(PlayerInventory $inventory) {
        $this->inventory = $inventory;
        parent::__construct("Save Your Inventory");
    }

    protected function onCreation(): void {
        $this->addElement("inventory_name", new Input("Type your inventory name:"));
    }

    protected function onSubmit(Player $player, FormResponse $response): void {
        $inventory_name = $response->getInputSubmittedText("inventory_name");
        if($this->getInventoryContents($player, $inventory_name) === null) {
            $this->saveInventory($player, $inventory_name);
            $player->sendMessage(TextFormat::GREEN . "You have created an inventory with the name " . TextFormat::WHITE . $inventory_name . TextFormat::GREEN ."!");
        } else {
            $player->sendMessage(TextFormat::RED . "You already have an inventory with the name " . TextFormat::WHITE . $inventory_name . TextFormat::RED ."!");
        }
    }

}