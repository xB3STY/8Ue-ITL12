# 8Ue-ITL12
**Name**: Basty Asumadu - **Übungstag**: 12.12.2024 - **Klasse**: 3aAPC - **Gruppe**: A - **Lehrgang**: 2


## Datenbank messages
![image](https://github.com/user-attachments/assets/2dfdb90a-6bd5-48cb-ac02-5be6751f6cca)



2. Änderungen in Dateien
UserModel.php
Funktion hinzugefügt, um Benutzerinformationen abzurufen:
getUserById($user_id) wird verwendet, um den Namen des Kontakts im Chat anzuzeigen.
MessagesController.php
chat($contact_id):
Nachrichten zwischen zwei Benutzern werden geladen.
Nachrichten werden nach dem Laden als "gelesen" markiert.
Der Kontaktname wird an die Ansicht übergeben.
MessageModel.php
getMessagesBetween($user1_id, $user2_id):
Holt die Nachrichten zwischen zwei Benutzern aus der Datenbank.
markMessagesAsRead($user_id, $sender_id):
Markiert Nachrichten als gelesen.
getUnreadMessagesWithSenders($user_id):
Liefert eine Liste der ungelesenen Nachrichten mit Absendernamen.
index.php
Kontaktliste auf der linken Seite.
Nachrichten-Box auf der rechten Seite mit:
Ausrichtung der Nachrichten (rechts/links).
Anzeige des Absendernamens und Zeitstempels.
chat.php
Nachrichtenlayout ähnlich wie in index.php für direkten Chat.
style.css
Neue CSS-Regeln für Nachrichten:
.message.sent und .message.received für die Ausrichtung und Farbgebung.
.sender-name für die Darstellung des Absendernamens.
.timestamp für den Zeitstempel.
Animationen für Nachrichten-Layout:
@keyframes fadeIn für ein besseres visuelles Erlebnis.








Wenn wir zb als Fruit angemeldet sind und Demo eine Nachricht schicken wollen (ich hab mal zwei Nachrichten verschickt)
![image](https://github.com/user-attachments/assets/e21a6ad3-decb-4cae-958f-48e6dc2dc741)

Und wenn wir und dann als Demo anmelden kommt dann bei dem Button Messages die Notifikation wiviele Nachrichten wir nicht gelesen haben
![image](https://github.com/user-attachments/assets/c0f6d2fe-793e-49e0-bd7b-89f1b1058157)
Wenn wir dann auf Fruit drücken verschwindet es dann auch danach 
![image](https://github.com/user-attachments/assets/e4986902-c8ac-4c91-a6c3-2965650235fa)

