<?php

declare(strict_types=1);


namespace diduhless\saveinventory\form;


use diduhless\saveinventory\utils\InventoryUtils;
use EasyUI\element\Button;
use EasyUI\variant\SimpleForm;
use pocketmine\Player;

class ViewInventoriesForm extends SimpleForm {
    use InventoryUtils;

    /** @var string[] */
    private $inventory_names;

    /**
     * ViewInventoriesForm constructor.
     * @param array $inventory_names
     */
    public function __construct(array $inventory_names) {
        $this->inventory_names = $inventory_names;
        parent::__construct("View Your Inventories");
    }

    protected function onCreation(): void {
        foreach($this->inventory_names as $inventory_name) {
            $button = new Button($inventory_name);
            $button->setSubmitListener(function(Player $player) use ($inventory_name) {
                $player->sendForm(new InventoryForm($inventory_name));
            });
            $this->addButton($button);
        }
    }

}