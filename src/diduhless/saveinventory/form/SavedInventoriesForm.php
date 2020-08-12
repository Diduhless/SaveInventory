<?php

declare(strict_types=1);


namespace diduhless\saveinventory\form;


use EasyUI\variant\SimpleForm;

class SavedInventoriesForm extends SimpleForm {

    public function __construct() {
        parent::__construct("Saved Inventories");
    }

}