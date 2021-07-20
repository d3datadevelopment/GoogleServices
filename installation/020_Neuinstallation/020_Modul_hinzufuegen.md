---
title: Modul zur Installation hinzufügen
---

### **auf der Kommandozeile**

Führen Sie in der Konsole im Hauptverzeichnis Ihres Shops (oberhalb des `source`- und `vendor`-Verzeichnisses) diesen Befehl aus, um das Modul **{$modulename}** zur Installation hinzuzufügen:

```bash
php composer require {$composerident}:^{$moduleversion} --update-no-dev
``` 

> [!] Achten Sie darauf, dass Composer für die Installation die selbe PHP-Version verwendet, in der auch Ihr Shop ausgeführt wird. Sie erhalten sonst möglicherweise unpassende Modulpakete.

> [i] Benötigt Ihre Installation einen anderen Aufruf von Composer, ändern Sie den Befehl bitte entsprechend ab. Für weitere Optionen dieses Befehls lesen Sie bitte die [Dokumentation von Composer](https://getcomposer.org/doc/03-cli.md#require).
