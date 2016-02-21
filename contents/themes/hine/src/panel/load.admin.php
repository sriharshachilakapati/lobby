<?php
/**
 * Panel UI
 */
$panelLeftItems = \Lobby\UI\Panel::getPanelItems("left");
?>
<nav>
  <ul class="left">
    <?php
    if(isset($panelLeftItems["lobbyAdmin"])){
      echo $this->makePanelTree("lobbyAdmin", $panelLeftItems["lobbyAdmin"]);
      unset($panelLeftItems["lobbyAdmin"]);
    }
    $html = "";
    foreach($panelLeftItems as $id => $item){
      if( !isset($item['subItems']) ){
        if( !isset($item['text']) && isset($item['html']) ){
          $html .= $this->makePanelItem($item['html'], "htmlContent", $id, "prnt");
        }else{
          $html .= $this->makePanelItem($item['text'], $item['href'], $id, "prnt");
        }
     }else{
        $html .= $this->makePanelTree($id, $item);
      }
    }
    echo $html;
    ?>
  </ul>
  <ul class="right">
    <?php \Lobby\UI\Panel::getPanelItems("right"); ?>
  </ul>
</nav>
