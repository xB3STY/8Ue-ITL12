<div class="messenger">
    <div class="chat-list">
        <h3>Contacts</h3>
        <ul>
            <?php foreach ($this->contacts as $contact): ?>
                <li><a href="<?php echo Config::get('URL'); ?>messages/chat/<?php echo $contact->user_id; ?>">
                        <?php echo htmlspecialchars($contact->user_name, ENT_QUOTES, 'UTF-8'); ?>
                    </a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="chat-box">
        <h3>Chat</h3>
        <?php if (isset($this->messages)): ?>
            <div class="messages">
                <?php foreach ($this->messages as $message): ?>
                    <div class="message <?php echo $message->sender_id == Session::get('user_id') ? 'sent' : 'received'; ?>">
                        <p><?php echo htmlspecialchars($message->message_content, ENT_QUOTES, 'UTF-8'); ?></p>
                        <span><?php echo $message->timestamp; ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
            <form method="post" action="<?php echo Config::get('URL'); ?>messages/sendMessage">
                <textarea name="message_content" placeholder="Write a message"></textarea>
                <input type="hidden" name="receiver_id" value="<?php echo $this->current_contact->user_id; ?>">
                <button type="submit">Send</button>
            </form>
        <?php else: ?>
            <p>Select a contact to start chatting.</p>
        <?php endif; ?>
    </div>
</div>
