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
        $this->getLogger()->info("Β§eLoading Lift Operator π Made By SomDevOP");

        /** @var array $loadWorlds */
       $loadWorlds = $this->getConfig()->get("load-worlds");
       /** @var string $world */
       foreach ($loadWorlds as $world) {
               if ($this->getServer()->getWorldManager()->loadWorld($world)) {
                    $this->getLogger()->info("Β§eWorld ${world} Has Been Successfully Loaded");
            }
        }
    }
    
    public function onEnable(): void
    {
    	$this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("Plugin π Lift Operator is Enabled π₯
                                                     βββββββββββββββββββββββββββ
                                                     βββββββββββββββββββββββββββ
                                                     βββββββββββββββββββββββββββ
                                                     βββββββββββββββββββββββββββ
                                                     βββββββββββββββββββββββββββ
                                                     βββββββββββββββββββββββββββ
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
        $this->getLogger()->info("Plugin Lift Operator π is going to sleep π΄")
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
                        $player->sendTitle("Β§eΒ§lIRON MINE");
                        break;
                        
                case 1:
                        $world = $this->getConfig()->get("gold-world");
                        $player->teleport(new Position(floatval($this->getConfig()->get("gold-x")), floatval($this->getConfig()->get("gold-y")), floatval($this->getConfig()->get("gold-z")), $this->getServer()->getWorldManager()->getWorldByName($world)));
                        $player->sendTitle("Β§eΒ§lGOLD MINE");
                        break;
                        
                case 2:
                        $world = $this->getConfig()->get("redstone-world");
                        $player->teleport(new Position(floatval($this->getConfig()->get("redstone-x")), floatval($this->getConfig()->get("redstone-y")), floatval($this->getConfig()->get("redstone-z")), $this->getServer()->getWorldManager()->getWorldByName($world)));
                        $player->sendTitle("Β§eΒ§lREDSTONE MINE");
                        break;
                        
                case 3:
                        $world = $this->getConfig()->get("lapis-world");
                        $player->teleport(new Position(floatval($this->getConfig()->get("lapis-x")), floatval($this->getConfig()->get("lapis-y")), floatval($this->getConfig()->get("lapis-z")), $this->getServer()->getWorldManager()->getWorldByName($world)));
                        $player->sendTitle("Β§eΒ§lLAPIS MINE");
                        break;
                        
                case 4:
                        $world = $this->getConfig()->get("emerald-world");
                        $player->teleport(new Position(floatval($this->getConfig()->get("emerald-x")), floatval($this->getConfig()->get("emerald-y")), floatval($this->getConfig()->get("emerald-z")), $this->getServer()->getWorldManager()->getWorldByName($world)));
                        $player->sendTitle("Β§eΒ§lEMEMRALD MINE");
                        break;
                         
               case 5:
                       $world = $this->getConfig()->get("diamond-world");
                       $player->teleport(new Position(floatval($this->getConfig()->get("diamond-x")), floatval($this->getConfig()->get("diamond-y")), floatval($this->getConfig()->get("diamond-z")), $this->getServer()->getWorldManager()->getWorldByName($world)));
                       $player->sendTitle("Β§eΒ§lDIAMOMD MINE");
                       break;
               case 6:
                       $world = $this->getConfig()->get("obsidian-world");
                       $player->teleport(new Position(floatval($this->getConfig()->get("obsidian-x")), floatval($this->getConfig()->get("obsidian-y")), floatval($this->getConfig()->get("obsidian-z")), $this->getServer()->getWorldManager()->getWorldByName($world)));
                       $player->sendTitle("Β§eΒ§lSANTUARY");
                       break;      
            }
     
       });
           
    }
 
 }
         
    $form->setTitle("Β§lΒ§cLIFT OPERATOR");
    $form->setContent("Β§rΒ§9Select The mine Which You Want To explore:");
    $form->addButton("Β§lΒ§bIRON MINE\nΒ§rΒ§lΒ§dΒ» Β§rΒ§8Tap To Teleport", 0, "https://cdn-icons-png.flaticon.com/512/7382/7382729.png");
    $form->addButton("Β§lΒ§bGOLD MINE\nΒ§rΒ§lΒ§dΒ» Β§rΒ§8Tap To Teleport", 0, "https://cdn-icons-png.flaticon.com/512/1473/1473504.png");
    $form->addButton("Β§lΒ§bREDSTONE MINE\nΒ§rΒ§lΒ§dΒ» Β§rΒ§8Tap To Teleport", 0, "https://cdn-icons-png.flaticon.com/512/594/594739.png");
    $form->addButton("Β§lΒ§bLAPIS MINE\nΒ§rΒ§lΒ§dΒ» Β§rΒ§8Tap To Teleport", 0, "https://cdn-icons-png.flaticon.com/512/6846/6846326.png");
    $form->addButton("Β§lΒ§bEMERALD MINE\nΒ§rΒ§lΒ§dΒ» Β§rΒ§8Tap To Teleport", 0, "https://cdn-icons-png.flaticon.com/512/6839/6839115.png");
    $form->addButton("Β§lΒ§bDIAMOND MINE\nΒ§rΒ§lΒ§dΒ» Β§rΒ§8Tap To Teleport", 0, "https://cdn-icons-png.flaticon.com/512/432/432492.png");
    $form->addButton("Β§lΒ§bSANTUARY\nΒ§rΒ§lΒ§dΒ» Β§rΒ§8Tap To Teleport", 0, "https://cdn-icons-png.flaticon.com/512/5054/5054297.png");
    $form->sendtoPlayer($player);
    return $form;
    
  }
}
