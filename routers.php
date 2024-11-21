
<?php
// je creer un classe pour le routeur qui sert à mon point d'entree 'index.php'
class router
{
        //fonction qui recupere l'url
    public function getController(string $uri): array
    {
        //on decoupe l'url entre les /
        $explodeUri=explode('/',$uri);
        // on recupere le 2eme index de l'url et si il est non vide on met la premiere lettre en majuscule. si vide on on prend Login par defaut 
        $controller=$explodeUri[1] ? ucfirst($explodeUri[1]) : 'Login';
        // on rajoute le mot Controller devant l'index
        $controller .= 'Controller';

        // on recupere le 3eme index de l'url  si il est non vide . si vide on on prend par defaut cars 
        $action=$explodeUri[2] ?? 'index';

        // on recupere le 4eme index de l'url si il est non vide . si vide on on prend par defaut Null
        $id=$explodeUri[3] ?? null;

        return [
            'controller'=>$controller,
            'action' => $action,
            'id' =>$id
        ];
        
    }

}