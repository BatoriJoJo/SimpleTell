<?php

namespace Batori\tellCommand;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\Server;

class tellCommand extends Command{

    public function __construct(string $name, string $description = "", string $usageMessage = null, array $aliases = [])
    {
        parent::__construct("tell", "send a private message to a player", "/tell player message",  ["msg", "pm"]);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player){
            if (isset($args[0])){
                $player = Server::getInstance()->getPlayer($args[0]);
                if ($player instanceof Player){
                    if(isset($args[1])){
                        unset($args[0]);
                        $message = implode(" ", $args);
                        $player->sendMessage("§4{$sender->getName()} §f» §4You §f» $message");
                        $sender->sendMessage("§4You §f» §4{$player->getName()} §f» $message");
                    }else{
                        $sender->sendMessage("§4» §fYou must specify a message.");
                    }
                }else{
                    $sender->sendMessage("§4» §f$player is not connected.");
                }
            }else{
                $sender->sendMessage("§4» §fYou must choose a player.");
            }
        }
    }
}