<?php

namespace App\Controllers\Traits;

trait MessageTrait
{
    private $messages = [];

    public function setError($message)
    {
        $this->addMessage('danger', $message);
    }

    public function setSuccess($message)
    {
        $this->addMessage('success', $message);
    }

    public function setWarning($message)
    {
        $this->addMessage('danger', $message);
    }

    private function addMessage($type, $message)
    {
        $this->messages[] = ['type' => $type, 'message' => $message];
    }

    public function getMessages()
    {
        $messages = $this->messages;
        $this->messages = []; // Limpiar mensajes después de obtenerlos
        return $messages;
    }
}
