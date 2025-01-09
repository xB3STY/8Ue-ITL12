<div class="container">
    <h3>Chat with <?php echo htmlspecialchars($this->current_contact->user_name, ENT_QUOTES, 'UTF-8'); ?></h3>
    <div class="messages">
        <?php foreach ($this->messages as $message): ?>
            <div class="message <?php echo $message->sender_id == Session::get('user_id') ? 'sent' : 'received'; ?>">
                <strong class="sender-name">
                    <?php echo $message->sender_id == Session::get('user_id')
                        ? 'You'
                        : htmlspecialchars($this->current_contact->user_name, ENT_QUOTES, 'UTF-8'); ?>
                </strong>
                <p><?php echo htmlspecialchars($message->message_content, ENT_QUOTES, 'UTF-8'); ?></p>
                <span class="timestamp"><?php echo date('H:i', strtotime($message->timestamp)); ?></span>
            </div>
        <?php endforeach; ?>
    </div>
    <form method="post" action="<?php echo Config::get('URL'); ?>messages/sendMessage">
        <textarea name="message_content" placeholder="Write a message"></textarea>
        <input type="hidden" name="receiver_id" value="<?php echo $this->current_contact->user_id; ?>">
        <button type="submit">Send</button>
    </form>
</div>
