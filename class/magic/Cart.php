<?php


namespace magic;


class Cart
{
    private $content=null;
    public function __construct(){
        if(isset($_SESSION['cart'])){
            $this->content=$_SESSION['cart'];
        }
    }

    public function add(array $selection):void{
        if(isset($_SESSION['cart'])){
            $tabId=$_SESSION['cart'];
            foreach($selection as $valId){
                $modif=false;
                foreach($tabId as $id=>$val){
                    if($id==$valId) {
                        $tabId[$id]=$val+1;
                        $modif=true;
                        break;
                    }
                    if(!$modif) $tabId[$valId] =1;
                }
            }
            $_SESSION['cart']=$tabId;
        }else{
            foreach($selection as $valId){
                $_SESSION['cart'][$valId]=1;
            }
        }

    }

    public function render():void{
        ?>
       <form class="browser" method="post" action="update_cart.php">
           <header style="flex-direction: column ; justify-content: center">
               <h1 style="padding: 5px">CART : <span id="num-cards"></span>$</h1>
               <button type="submit" class="btn btn-danger" style="width: 100%; margin: 0px; visibility: hidden;" id="update-cart">
                   UPDATE CART
               </button>
           </header>
           <div class="browser-content-wrapper">
                <div class="browser-content">
                    <?php if(isset($_SESSION['cart'])):?>
                        <?php foreach($this->content as $id=>$val):?>
                        <?php foreach((new \magic\Shop())->getData() as $card):?>
                        <?php if($id==$card->id):?>
                        <div class="magic-card selected">
                            <img src="<?=$card->image_uris->small?>"/>
                            <legend>
                                <label for="<?=$card->id?>" id="nameLegend"><?=$card->name?></label>
                                <input type="number" id="<?=$card->id?>" name="<?=$card->id?>" value="<?=$val?>">
                            </legend>
                        </div>
                        <?php endif;?>
                        <?php endforeach;?>
                        <?php endforeach;?>
                    <?php endif;?>
                </div>
            </div>
           <input type="hidden" name="update"/>
       </form>

        <script>

            let inputs = undefined
            let numCards = undefined
            let updateCard = undefined
            document.addEventListener('DOMContentLoaded', function (){
                numCards = document.getElementById('num-cards')
                updateCard = document.getElementById('update-cart')
                inputs = document.getElementsByTagName('input')
                for (let input of inputs){
                    input.addEventListener('change', function (){
                        if(this.value !== this.defaultValue){
                            this.parentElement.parentElement.classList.remove('selected')
                            this.parentElement.parentElement.classList.add('edited')
                        }else{
                            this.parentElement.parentElement.classList.remove('edited')
                            this.parentElement.parentElement.classList.add('selected')
                        }
                        coutTotal()
                        UpdateBtn()
                    })
                }
                coutTotal()
                UpdateBtn()
            })

            function coutTotal(){
                let TotalValue = 0
                for(let input of inputs){
                    let value = parseInt(input.value)
                    value = (value >= 0) ? value : 0
                    TotalValue+= value
                }
                numCards.innerHTML = TotalValue*0.25
            }
            function UpdateBtn(){
                let ClassEdited = document.getElementsByClassName('edited')
                updateCard.style.visibility = (ClassEdited.length != 0) ? 'visible' : 'hidden'
            }
        </script>
    <?php
    }

    public function update(array $cart):void{

        foreach($cart as $id=>$val){
            $_SESSION['cart'][$id]=$val;
        }
        $this->content=$_SESSION['cart'];

    }
}