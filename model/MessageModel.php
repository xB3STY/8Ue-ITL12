<?php

class MessageModel
{
    public static function getAllContacts($current_user_id)
    {
        $db = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT user_id, user_name 
                FROM users 
                WHERE user_id != :current_user_id";

        $query = $db->prepare($sql);
        $query->execute([':current_user_id' => $current_user_id]);

        return $query->fetchAll();
    }

    public static function getMessagesBetween($user1_id, $user2_id)
    {
        $db = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT * FROM messages
                WHERE (sender_id = :user1_id AND receiver_id = :user2_id)
                   OR (sender_id = :user2_id AND receiver_id = :user1_id)
                ORDER BY timestamp ASC";

        $query = $db->prepare($sql);
        $query->execute([
            ':user1_id' => $user1_id,
            ':user2_id' => $user2_id
        ]);

        return $query->fetchAll();
    }

    public static function sendMessage($sender_id, $receiver_id, $message_content)
    {
        $db = DatabaseFactory::getFactory()->getConnection();

        $sql = "INSERT INTO messages (sender_id, receiver_id, message_content, is_read, timestamp)
                VALUES (:sender_id, :receiver_id, :message_content, 0, NOW())";

        $query = $db->prepare($sql);
        return $query->execute([
            ':sender_id' => $sender_id,
            ':receiver_id' => $receiver_id,
            ':message_content' => $message_content
        ]);
    }

    public static function getUnreadMessagesCount($user_id)
    {
        $db = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT COUNT(*) AS unread_count FROM messages
                WHERE receiver_id = :user_id AND is_read = 0";

        $query = $db->prepare($sql);
        $query->execute([':user_id' => $user_id]);

        return $query->fetch()->unread_count;
    }

    public static function markMessagesAsRead($user_id, $sender_id)
    {
        $db = DatabaseFactory::getFactory()->getConnection();

        $sql = "UPDATE messages 
            SET is_read = 1 
            WHERE receiver_id = :user_id AND sender_id = :sender_id AND is_read = 0";

        $query = $db->prepare($sql);
        $query->execute([
            ':user_id' => $user_id,
            ':sender_id' => $sender_id
        ]);
    }

    public static function getUnreadMessagesWithSenders($user_id)
    {
        $db = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT messages.message_id, messages.message_content, messages.timestamp, 
                   users.user_name AS sender_name 
            FROM messages
            JOIN users ON messages.sender_id = users.user_id
            WHERE messages.receiver_id = :user_id AND messages.is_read = 0
            ORDER BY messages.timestamp DESC";

        $query = $db->prepare($sql);
        $query->execute([':user_id' => $user_id]);

        return $query->fetchAll();
    }

}
