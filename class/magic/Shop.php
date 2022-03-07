<?php


namespace magic;


class Shop
{
    private $data;

    public function __construct(){
        $jsonFile=file_get_contents("data/cards.json");
        $this->data=json_decode($jsonFile);
    }

    public function getData(){
        return $this->data;
    }
    public function generateShop(){
        ?>

        <form class="browser" method="POST" action="add_to_cart.php">
            <header>
                <div style="padding: 5px">SELECTION : <span id="num-cards">none</span></div>
                <button type="submit" class="btn btn-dark" id="add-to-cart" disabled="">Add to Cart</button>
            </header>
            <div class="browser-content-wrapper">
                <div class="browser-content">
                    <?php  foreach($this->data as $card):?>
                        <div class="magic-card">
                            <img src="<?=$card->image_uris->small?>"/>
                            <legend>
                                <label for="<?=$card->id?>" id="nameLegend"><?=$card->name?></label>
                                <input type="checkbox" name="ListeCart[]" value="<?=$card->id?>" id="<?=$card->id?>">
                            </legend>
                        </div>
                    <?php endforeach;?>
                </div>
            </div>
        </form>
        <script>

            document.addEventListener('DOMContentLoaded', function (){
                document.getElementById('add-to-cart').disabled = true
                let checkBox = document.querySelectorAll("input[type='checkbox']")
                for (let check of checkBox){
                    check.addEventListener('change', function (event){
                        if (this.checked){
                            this.parentElement.parentElement.classList.add('selected')
                        }else{
                            this.parentElement.parentElement.classList.remove('selected')
                        }
                        compterSelection()
                    })
                    check.parentElement.parentElement.addEventListener('click', function (){
                        let input = this.querySelector("input[type='checkbox']") ;
                        input.checked=!input.checked;
                        if (input.checked){
                            this.classList.add('selected')
                        }else{
                            this.classList.remove('selected')
                        }
                        compterSelection()
                    })


                }
                compterSelection()
            })

            function compterSelection(){
                let cochers = document.querySelectorAll("input[type='checkbox']:checked")

                if(cochers.length ===0){
                    document.getElementById('add-to-cart').disabled = true
                    document.getElementById('num-cards').innerHTML = 'none'
                }else{
                    document.getElementById('add-to-cart').disabled = false
                    document.getElementById('num-cards').innerHTML = String(cochers.length)
                }
            }
        </script>
        <?php

    }
}