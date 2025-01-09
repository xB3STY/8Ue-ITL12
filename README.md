# 8Ue-ITL12
**Name**: Basty Asumadu - **Übungstag**: 12.12.2024 - **Klasse**: 3aAPC - **Gruppe**: A - **Lehrgang**: 2

---

## **Datenbank: messages**
![image](https://github.com/user-attachments/assets/2dfdb90a-6bd5-48cb-ac02-5be6751f6cca)

---

## **Geänderte und hinzugefügte Dateien**

### 1. **Model: `UserModel.php`**
- **Pfad**: `application/model/UserModel.php`
- **Änderungen**:
  - Neue Funktion hinzugefügt:
    - **`getUserById($user_id)`**: Wird verwendet, um den Namen des Kontakts im Chat anzuzeigen.

---

### 2. **Controller: `MessagesController.php`**
- **Pfad**: `application/controller/MessagesController.php`
- **Änderungen**:
  - **`chat($contact_id)`**:
    - **Nachrichten** zwischen zwei Benutzern werden geladen.
    - **Nachrichten** werden nach dem Laden als "gelesen" markiert.
    - Der **Kontaktname** wird an die Ansicht übergeben.

---

### 3. **Model: `MessageModel.php`**
- **Pfad**: `application/model/MessageModel.php`
- **Änderungen**:
  - **`getMessagesBetween($user1_id, $user2_id)`**:
    - Holt die **Nachrichten** zwischen zwei Benutzern aus der Datenbank.
  - **`markMessagesAsRead($user_id, $sender_id)`**:
    - Markiert **Nachrichten** als gelesen.
  - **`getUnreadMessagesWithSenders($user_id)`**:
    - Liefert eine Liste der **ungelesenen Nachrichten** mit **Absendernamen**.

---

### 4. **Ansicht: `index.php`**
- **Pfad**: `application/view/messages/index.php`
- **Änderungen**:
  - **Kontaktliste** auf der linken Seite.
  - **Nachrichten-Box** auf der rechten Seite mit:
    - **Ausrichtung** der Nachrichten (rechts/links).
    - **Anzeige** des **Absendernamens** und **Zeitstempels**.

---

### 5. **Ansicht: `chat.php`**
- **Pfad**: `application/view/messages/chat.php`
- **Änderungen**:
  - **Nachrichtenlayout** ähnlich wie in `index.php` für direkten Chat.

---

### 6. **CSS: `style.css`**
- **Pfad**: `public/css/style.css`
- **Änderungen**:
  - **Neue CSS-Regeln** für Nachrichten:
    - **`.message.sent`** und **`.message.received`**: Für die **Ausrichtung und Farbgebung**.
    - **`.sender-name`**: Für die Darstellung des **Absendernamens**.
    - **`.timestamp`**: Für den **Zeitstempel**.
  - **Animationen**:
    - **`@keyframes fadeIn`**: Für ein besseres visuelles Erlebnis.

---

## **Screenshots**

### **Nachrichten senden als Fruit**
- Als Benutzer **Fruit** zwei Nachrichten an **Demo** geschickt:
![image](https://github.com/user-attachments/assets/e21a6ad3-decb-4cae-958f-48e6dc2dc741)

---

### **Ungelesene Nachrichten anzeigen**
- Als Benutzer **Demo** eingeloggt:  
  - **Badge** zeigt die Anzahl der ungelesenen Nachrichten an:
![image](https://github.com/user-attachments/assets/c0f6d2fe-793e-49e0-bd7b-89f1b1058157)

---

### **Nachrichten lesen**
- Nach dem Öffnen des Chats mit **Fruit** verschwinden die ungelesenen Nachrichten:
![image](https://github.com/user-attachments/assets/e4986902-c8ac-4c91-a6c3-2965650235fa)

---

### **Testfälle**
1. **Nachricht senden**:
   - Nachrichten des aktuellen Benutzers erscheinen rechts mit blauem Hintergrund.
   - Nachrichten des Kontakts erscheinen links mit grauem Hintergrund.
   - Name und Zeitstempel werden korrekt angezeigt.
2. **Ungelesene Nachrichten**:
   - Ungelesene Nachrichten werden in der Kontaktliste mit einer Badge angezeigt.
3. **Styling**:
   - Nachrichten sind animiert und mit klarer Struktur versehen.

---

### **Verknüpfte Dateien**
- [UserModel.php](model/UserModel.php)
- [MessagesController.php](controller/MessagesController.php)
- [MessageModel.php](model/MessageModel.php)
- [index.php](messages/index.php)
- [chat.php](messages/chat.php)
- [style.css](css/style.css)

---
