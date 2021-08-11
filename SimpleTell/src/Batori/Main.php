<?php

namespace Batori\Main;

use Batori\tellCommand\tellCommand;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase{

    public function onEnable()
    {
        $this->getLogger()->info("SimpleTell ON");
        $this->getServer()->getCommandMap()->register("commands",
        new tellCommand()
        );
    }

}