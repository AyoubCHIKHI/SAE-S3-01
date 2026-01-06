<?php
// Mock Router class partially to test logic
class Router {
    public function dispatchMock($uri) {
        $uri = parse_url($uri, PHP_URL_PATH);
        if ($uri !== '/' && substr($uri, -1) === '/') {
            $uri = rtrim($uri, '/');
        }
        return $uri;
    }
}

$router = new Router();
echo "Testing /admin/login/: " . ($router->dispatchMock('/admin/login/') === '/admin/login' ? 'PASS' : 'FAIL') . "\n";
echo "Testing /admin/login: " . ($router->dispatchMock('/admin/login') === '/admin/login' ? 'PASS' : 'FAIL') . "\n";
echo "Testing /: " . ($router->dispatchMock('/') === '/' ? 'PASS' : 'FAIL') . "\n";
