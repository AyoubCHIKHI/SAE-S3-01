<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\Message;

class MessageController extends Controller {

    public function index() {
        $this->requireAuth();
        $messageModel = new Message();
        $messages = $messageModel->getAll();
        $this->view('admin/messages/index', ['messages' => $messages]);
    }

    public function reply() {
        $this->requireAuth();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            $reply = $_POST['reply'] ?? '';
            
            if ($id && $reply) {
                $messageModel = new Message();
                $messageModel->reply($id, $reply);
            }
            $this->redirect('/admin/messages');
        }
    }
}
