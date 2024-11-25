<?php
class router
{
    public function getController(string $uri): array
    {
        $explodeUri = explode('/', $uri);
        $controller = $explodeUri[1] ? ucfirst($explodeUri[1]) : 'Login';
        
        if ($controller === 'Home') {
            $action = $explodeUri[2] ?? 'home';
        } else {
            $action = $explodeUri[2] ?? 'page';
        }

        $controller .= 'Controller';
        $id = $explodeUri[3] ?? null;

        return [
            'controller' => $controller,
            'action' => $action,
            'id' => $id
        ];
    }
}