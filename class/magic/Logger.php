<?php


namespace magic;


class Logger
{
    public function generateLoginForm(string $action): void{
        ?>
        <form method="post" action="<?=$action?>" class="card" id="login-form">
            <legend style="text-align:center">Please Login</legend>
            <div class="form-group">
                <input type="text" autofocus placeholder="username" name="username" value="<?php if(isset($_POST['username']))  echo htmlspecialchars($_POST['username']);?>"/>
                <input type="password" placeholder="password" name="password"/>
            </div>
            <button type="submit" class="btn btn-dark">LOGIN</button>
        </form>
        <?php
    }

    public function log(string $username, string $password): array{
        $tabRes=array('granted'=>false,"nick"=>null,"error"=>null);
        if(!empty($username) && !empty($password)){
            if($username=="gandalf" && $password="warma"){
                $tabRes['granted']=true;
                $tabRes['nick']="gandalf";
                return $tabRes;
            }
            else $tabRes["error"]="authentification failed";
            return $tabRes;
        }
        if(empty($username))$tabRes['error']="username is empty";
        else $tabRes['error']="password is empty";
        return $tabRes;
    }
}