<div class="messenger">
    <!-- Kontakte Liste -->
    <div class="chat-list">
        <h3>Contacts</h3>
        <ul>
            <?php if (!empty($this->contacts)): ?>
                <?php foreach ($this->contacts as $contact): ?>
                    <li>
                        <a href="<?php echo Config::get('URL'); ?>messages/chat/<?php echo $contact->user_id; ?>">
                            <?php echo htmlspecialchars($contact->user_name, ENT_QUOTES, 'UTF-8'); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>No contacts available.</li>
            <?php endif; ?>
        </ul>
    </div>

    <!-- Nachrichten Box -->
    <div class="chat-box">
        <?php if (!empty($this->messages)): ?>
            <h3>Chat with <?php echo htmlspecialchars($this->current_contact->user_name, ENT_QUOTES, 'UTF-8'); ?></h3>
            <div class="messages">
                <?php foreach ($this->messages as $message): ?>
                    <div class="message <?php echo $message->sender_id == Session::get('user_id') ? 'sent' : 'received'; ?>">
                        <strong class="sender-name">
                            <?php
                            echo $message->sender_id == Session::get('user_id')
                                ? 'You'
                                : htmlspecialchars($this->current_contact->user_name, ENT_QUOTES, 'UTF-8');
                            ?>
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
        <?php else: ?>
            <p>Select a contact to start chatting.</p>
        <?php endif; ?>
    </div>

    <!-- Ungelesene Nachrichten -->
    <div class="unread-messages">
        <h3>Unread Messages</h3>
        <ul>
            <?php if (!empty($this->unread_messages)): ?>
                <?php foreach ($this->unread_messages as $message): ?>
                    <li>
                        <strong><?php echo htmlspecialchars($message->sender_name, ENT_QUOTES, 'UTF-8'); ?>:</strong>
                        <span><?php echo htmlspecialchars($message->message_content, ENT_QUOTES, 'UTF-8'); ?></span>
                        <small><?php echo date('Y-m-d H:i:s', strtotime($message->timestamp)); ?></small>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>No unread messages.</li>
            <?php endif; ?>
        </ul>
    </div>
</div>
