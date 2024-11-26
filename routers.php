<?php
class Router
{
    public function getController(string $uri): array
    {
        // Découper l'URI en segments
        $explodeUri = explode('/', trim($uri, '/'));

        // Déterminer le contrôleur
        $controller = !empty($explodeUri[0]) ? ucfirst($explodeUri[0]) : 'Login';

        // Par défaut, utiliser "home" comme action
        $action = !empty($explodeUri[1]) ? $explodeUri[1] : 'home';

        // Ajouter "Controller" au nom du contrôleur
        $controller .= 'Controller';

        // Récupérer l'ID s'il existe
        $id = $explodeUri[2] ?? null;

        return [
            'controller' => $controller,
            'action' => $action,
            'id' => $id
        ];
    }
}
