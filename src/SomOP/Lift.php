<?php 

namespace SomOP;

use pocketmine\Server;
use pocketmine\player\Player;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\plugin\PluginBase;
use onebone\economyapi\EconomyAPI;
use pocketmine\utils\Config;

use jojoe77777\FormAPI\SimpleForm;
use jojoe77777\FormAPI\CustomForm;

class Lift extends PluginBase implements Listener

public function onLoad(): void
    {
        self::$instance = $this;
        $this->getLogger()->info("§eLoading Lift Operator 🛗 Made By SomDevOP");

        /** @var array $loadWorlds */
       $loadWorlds = $this->getConfig()->get("load-worlds");
       /** @var string $world */
       foreach ($loadWorlds as $world) {
               if ($this->getServer()->getWorldManager()->loadWorld($world)) {
                    $this->getLogger()->info("§eWorld ${world} Has Been Successfully Loaded");
            }
        }
    }
    
    public function onEnable(): void
    {
    	$this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("Plugin 🛗 Lift Operator is Enabled 🔥
                                                     ░██████╗░█████╗░███╗░░░███╗
                                                     ██╔════╝██╔══██╗████╗░████║
                                                     ╚█████╗░██║░░██║██╔████╔██║
                                                     ░╚═══██╗██║░░██║██║╚██╔╝██║
                                                     ██████╔╝╚█████╔╝██║░╚═╝░██║
                                                     ╚═════╝░░╚════╝░╚═╝░░░░░╚═╝
                                                     Made By Som");
 
 $this->reloadConfig();
 Server::getInstance()->getPluginManager()->registerEvents(new EventListener(), $this);
 $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->saveResource("config.yml");
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML, array());
  }
    
      public function onDisable(): void
    {
    	$this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("Plugin Lift Operator 🛗 is going to sleep 😴")
       }
       
      public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool{
                 switch($command->getName()){
                 	    case "liftui":
                              if($sender->hasPermission("liftui.cmd")){
                              	$this->warpui($sender);
                               } else {
                              	$sender->sendMessage("You Don't Have Permission To Use This Command");
                      }
                   }
                   
                   return true;
                   
           }
           
public function liftui(Player $player) {
       $form = $this->getServer()->getPluginManager()->getPlugin("FormAPI")->createSimpleForm(function (Player $player, int $data = null){
           if($data === null){
                      	                               return true;
                      
           switch ($data){ 
           	
                case 0:
                        $world = $this->getConfig()->get("iron-world");
                        
                        $player->teleport(new Position(floatval($this->getConfig()->get("iron-x")), floatval($this->getConfig()->get("iron-y")), floatval($this->getConfig()->get("iron-z")), $this->getServer()->getWorldManager()->getWorldByName($world)));
                        $player->sendTitle("§e§lIRON MINE");
                        break;
                        
                case 1:
                        $world = $this->getConfig()->get("gold-world");
                        $player->teleport(new Position(floatval($this->getConfig()->get("gold-x")), floatval($this->getConfig()->get("gold-y")), floatval($this->getConfig()->get("gold-z")), $this->getServer()->getWorldManager()->getWorldByName($world)));
                        $player->sendTitle("§e§lGOLD MINE");
                        break;
                        
                case 2:
                        $world = $this->getConfig()->get("redstone-world");
                        $player->teleport(new Position(floatval($this->getConfig()->get("redstone-x")), floatval($this->getConfig()->get("redstone-y")), floatval($this->getConfig()->get("redstone-z")), $this->getServer()->getWorldManager()->getWorldByName($world)));
                        $player->sendTitle("§e§lREDSTONE MINE");
                        break;
                        
                case 3:
                        $world = $this->getConfig()->get("lapis-world");
                        $player->teleport(new Position(floatval($this->getConfig()->get("lapis-x")), floatval($this->getConfig()->get("lapis-y")), floatval($this->getConfig()->get("lapis-z")), $this->getServer()->getWorldManager()->getWorldByName($world)));
                        $player->sendTitle("§e§lLAPIS MINE");
                        break;
                        
                case 4:
                        $world = $this->getConfig()->get("emerald-world");
                        $player->teleport(new Position(floatval($this->getConfig()->get("emerald-x")), floatval($this->getConfig()->get("emerald-y")), floatval($this->getConfig()->get("emerald-z")), $this->getServer()->getWorldManager()->getWorldByName($world)));
                        $player->sendTitle("§e§lEMEMRALD MINE");
                        break;
                         
               case 5:
                       $world = $this->getConfig()->get("diamond-world");
                       $player->teleport(new Position(floatval($this->getConfig()->get("diamond-x")), floatval($this->getConfig()->get("diamond-y")), floatval($this->getConfig()->get("diamond-z")), $this->getServer()->getWorldManager()->getWorldByName($world)));
                       $player->sendTitle("§e§lDIAMOMD MINE");
                       break;
               case 6:
                       $world = $this->getConfig()->get("obsidian-world");
                       $player->teleport(new Position(floatval($this->getConfig()->get("obsidian-x")), floatval($this->getConfig()->get("obsidian-y")), floatval($this->getConfig()->get("obsidian-z")), $this->getServer()->getWorldManager()->getWorldByName($world)));
                       $player->sendTitle("§e§lSANTUARY");
                       break;      
            }
     
       });
           
    }
 
 }
         
    $form->setTitle("§l§cLIFT OPERATOR");
    $form->setContent("§r§9Select The mine Which You Want To explore:");
    $form->addButton("§l§bIRON MINE\n§r§l§d» §r§8Tap To Teleport", 0, "https://cdn-icons-png.flaticon.com/512/4618/4618495.png");
    $form->addButton("§l§bGOLD MINE\n§r§l§d» §r§8Tap To Teleport", 0, "https://cdn-icons-png.flaticon.com/512/532/532606.png");
    $form->addButton("§l§bREDSTONE MINE\n§r§l§d» §r§8Tap To Teleport", 0, "https://cdn-icons-png.flaticon.com/512/4492/4492671.png");
    $form->addButton("§l§bLAPIS MINE\n§r§l§d» §r§8Tap To Teleport", 0, "https://cdn-icons-png.flaticon.com/512/7417/7417717.png");
    $form->addButton("§l§bEMERALD MINE\n§r§l§d» §r§8Tap To Teleport", 0, "https://cdn-icons-png.flaticon.com/512/3472/3472185.png");
    $form->addButton("§l§bDIAMOND MINE\n§r§l§d» §r§8Tap To Teleport", 0, "https://cdn-icons-png.flaticon.com/512/2084/2084189.png");
    $form->addButton("§l§bSANTUARY\n§r§l§d» §r§8Tap To Teleport", 0, "https://cdn-icons-png.flaticon.com/512/4617/4617270.png");
    $form->sendtoPlayer($player);
    return $form;
    
  }
}
