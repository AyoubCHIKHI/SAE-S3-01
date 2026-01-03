<?php

require_once __DIR__ . '/../db.php';

class Newsletter
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = getPDO();
    }

    // --- Subscribers ---

    public function addSubscriber(string $email): bool
    {
        // Check if exists
        $stmt = $this->pdo->prepare("SELECT id FROM newsletter_subscribers WHERE email = :email");
        $stmt->execute(['email' => $email]);
        if ($stmt->fetch()) {
            return true; // Already subscribed
        }

        $stmt = $this->pdo->prepare("INSERT INTO newsletter_subscribers (email) VALUES (:email)");
        return $stmt->execute(['email' => $email]);
    }

    public function getSubscribersCount(): int
    {
        return $this->pdo->query("SELECT COUNT(*) FROM newsletter_subscribers WHERE is_active = 1")->fetchColumn();
    }
    
    public function getAllSubscribers(): array
    {
        return $this->pdo->query("SELECT * FROM newsletter_subscribers ORDER BY subscribed_at DESC")->fetchAll(PDO::FETCH_ASSOC);
    }

    // --- Newsletters ---

    public function getAllNewsletters(): array
    {
        $stmt = $this->pdo->query("SELECT n.*, u.first_name, u.last_name FROM newsletters n LEFT JOIN users u ON n.created_by = u.id ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createDraft(string $subject, string $content, int $userId): bool
    {
        $stmt = $this->pdo->prepare("INSERT INTO newsletters (subject, content, status, created_by) VALUES (:subject, :content, 'DRAFT', :userId)");
        return $stmt->execute([
            'subject' => $subject,
            'content' => $content,
            'userId' => $userId
        ]);
    }

    public function send(int $id): bool
    {
        // In a real app, this would trigger email sending
        // Here we just mark as sent
        $stmt = $this->pdo->prepare("UPDATE newsletters SET status = 'SENT', sent_at = NOW() WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
