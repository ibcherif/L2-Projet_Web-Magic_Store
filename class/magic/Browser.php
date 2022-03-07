<?php


namespace magic;


class Browser
{

    private $data;
    public function __construct(){
        $jsonFile=file_get_contents("data/cards.json");
        $this->data=json_decode($jsonFile);
    }

    public function generateCards():void{
    ?>
        <div style="color:white;margin:15px;">Magic Card</div>
       <form class="browser">
            <div class="browser-content-wrapper">
                <div class="browser-content">
                     <?php foreach($this->data as $card):?>
                        <div class="magic-card">
                            <img src="<?=$card->image_uris->small?>"/>
                            <legend>
                                <label for="<?=$card->id?>" id="nameLegend"><?=$card->name?></label>
                            </legend>
                        </div>
                         <?php endforeach;?>
                </div>
            </div>
       </form>
        <?php

    }
}