# D³ Google-Services

Dieses Modul bietet eine Schritt-für-Schritt Konfiguration von Individualartikeln an. Der Kunde wählt in jedem
Schritt die von ihm gewünschte Option, die mit Bildern, Beschreibungstexten und ggf. Aufpreisinformationen
dargestellt werden können. Weiterhin gibt es optionale Freitexte, in denen z.B. Abmessungen etc. hinterlegt werden können.

## Voraussetzungen

* PHP Version
    * 7.0.x bis PHP 7.2.x
* Shopversionen / -editionen
    * OXID eShop Community Edition (CE), Professional Edition (PE) oder Enterprise Edition (EE) in Compilation Version
        * 6.0.x
        * 6.1.x
* [D³ Modul-Connector](https://www.oxidmodule.com/Modul-Connector/Modul-Connector-fuer-Oxid-CE-PE-EE.html)
    * Version 5.1.1.x

### Anforderungsprüfung

Im Ordner `setup+doku` finden Sie die Datei `d3precheck.php`. Mit dieser können Sie die Mindestanforderungen auf Ihrem
Server direkt prüfen. Kopieren Sie die Datei unverändert in das `source`-Verzeichnis Ihres
installierten OXID-Shops. Rufen Sie nun über Ihren Browser die folgende Adresse auf:

[http://www.ihreadresse.de/d3precheck.php](http://www.ihreadresse.de/d3precheck.php)

Ihnen werden nun Details und Ergebnisse zur Anforderungsprüfung angezeigt.

> Wichtig! Löschen Sie diese Scripte mit Hilfe der in der Übersicht enthaltenen Funktion bitte unbedingt nach der Prüfung
wieder von Ihrem Server.

## Installation

### 1. Modul in Shop kopieren

Das erhaltene Installationspaket entpacken Sie bitte zuerst auf Ihrem Rechner. Darin finden Sie den Ordner `copy_this`.
Kopieren Sie dessen Inhalt inklusiv dessen Verzeichnisstruktur in den Stamm-Ordner Ihres Online-Shops.
Schon vorhandene Dateien überschreiben Sie bitte einfach.

> Wichtig! Achten Sie darauf, dass speziell die PHP-Dateien im Binär-Modus übertragen werden. Wie Sie diesen einstellen können, entnehmen Sie der Hilfe Ihrer FTP-Anwendung.

### 2. Modul im Shop aktivieren

Aktivieren Sie das Modul über den Shopadmin unter [ Erweiterungen ] -> [ Module ]. Klicken Sie nach Auswahl von
[ D³ Google Services Schnittstelle ] auf den Button [ Aktivieren ].

> Wichtig! **Enterprise Editon**: Achten Sie darauf, dass das Modul in weiteren Shops (Mall) ebenfalls aktiviert werden muss,
um dessen Funktion dort auch zu nutzen.

Direkt nach der Modulaktivierung startet der Assistent, der Sie durch die Shopanpassung führt. Darin können Sie verschiedene
Optionen der Installation wählen.
Den Installationsassistenten finden Sie auch unter den Menüpunkten
[ Admin ] -> [ D3 Module ] -> [ Modul-Connector ] -> [ Modulverwaltung ] -> [ Modulinstallation ].
Bei tiefgreifenden Änderungen an Ihrem Shop (z.B. Hinzufügen weiterer Sprachen oder Mandanten) rufen Sie den
Installationsassistenten bitte erneut auf, um dann eventuell notwendige Nacharbeiten für das Modul ausführen zu lassen.
Möchten Sie die Änderungen manuell installieren, können Sie sich über diesen Assistenten ebenfalls eine Checkliste erstellen.

### 3. TMP-Ordner leeren

Leeren Sie das Verzeichnis `tmp` über [ Admin ] -> [ D3 Module ] -> [ Modul-Connector ] -> [ TMP leeren ].
Markieren Sie [ komplett leeren ] und klicken auf [ TMP leeren ].

Sofern die Views nicht automatisch aktualisiert werden, führen Sie dies noch durch.

> Erfordert Ihre Installation eine andere Vorgehensweise zum Leeren des Caches oder zum Aktualisieren der
Datenbank-Viewtabellen, führen Sie diese bitte aus.

## Update

### 1. Modul in Shop kopieren

Deaktivieren Sie das Modul über den Shopadmin unter [ Erweiterungen ] -> [ Module ]. Klicken Sie nach Auswahl von
[ D³ Google Services Schnittstelle ] auf den Button [ Dektivieren ].

> Wichtig! **Enterprise Editon**: Achten Sie darauf, dass das Modul in weiteren Shops (Mall) ebenfalls deaktiviert werden muss.

Das erhaltene Installationspaket entpacken Sie bitte zuerst auf Ihrem Rechner. Darin finden Sie den Ordner `copy_this`.
Kopieren Sie dessen Inhalt inklusiv dessen Verzeichnisstruktur in den Stamm-Ordner Ihres Online-Shops.
Schon vorhandene Dateien überschreiben Sie bitte einfach.

> Wichtig! Achten Sie darauf, dass speziell die PHP-Dateien im Binär-Modus übertragen werden. Wie Sie diesen einstellen können, entnehmen Sie der Hilfe Ihrer FTP-Anwendung.


### 2. Modul im Shop aktivieren

Ob Shopanpassungen notwendig sind, ist von der Versionsänderung des Moduls abhängig.

Möglicherweise sehen Sie nach dem Neuaktivieren des Moduls den Installationsassistent, der Sie durch die Änderungen
führt. Folgen Sie dann den einzelnen Schritten. Möchten Sie die Änderungen manuell installieren, können Sie sich
über diesen Assistenten ebenfalls eine Checkliste erstellen.

Wird der Assistent nicht gezeigt (Sie sehen wieder die Modulübersicht), waren keine Anpassungen am Shop notwendig.

Ob erforderliche Updates ausgeführt werden sollen, können Sie jederzeit im Adminbereich unter
[ D3 Module ] -> [ Modul-Connector ] -> [ Modulverwaltung ] -> [ Modulinstallation ] prüfen.

### 3. TMP-Ordner leeren

Leeren Sie das Verzeichnis `tmp` über [ Admin ] -> [ D3 Module ] -> [ Modul-Connector ] -> [ TMP leeren ].
Markieren Sie [ komplett leeren ] und klicken auf [ TMP leeren ].

Sofern die Views nicht automatisch aktualisiert werden, führen Sie dies noch durch.

> Erfordert Ihre Installation eine andere Vorgehensweise zum Leeren des Caches oder zum Aktualisieren der
Datenbank-Viewtabellen, führen Sie diese bitte aus.

## Hilfe und Support

Bei Bedarf bieten wir Ihnen auch gern die Installation des Moduls in Ihrem Shop an. Geben Sie uns bitte unter den unten
genannten Kontaktdaten Bescheid.

Haben Sie Fragen oder Unklarheiten in Verbindung mit diesem Modul oder dessen Installation, stehen Ihnen Hilfetexte in
unserer [Modul-FAQ](http://faq.oxidmodule.com/) zur Verfügung. Finden Sie darin die benötigten Antworten nicht, kontaktieren
Sie uns bitte unter den folgenden Möglichkeiten:
1. per E-Mail: <support@shopmodule.com> oder
2. über das Kontaktformular auf [Oxidmodule.com](https://www.oxidmodule.com/) oder
3. per Telefon: (+49) 37 21 / 26 80 90 zu unseren Bürozeiten

Geben Sie bitte an, wo und wie wir gegebenenfalls vorhandene Schwierigkeiten nachvollziehen können. Sind Ihre Fragen
shopspezifisch, benötigen wir möglicherweise Zugangsdaten zum betreffenden Shop.
