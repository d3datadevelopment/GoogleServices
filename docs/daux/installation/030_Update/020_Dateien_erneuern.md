---
title: Dateien erneuern
---

### **auf der Kommandozeile**

Starten Sie die Konsole Ihres Webservers und wechseln in das Hauptverzeichnis Ihres 
Shops (oberhalb des `source`- und `vendor`-Verzeichnisses). Führen Sie dort diesen Befehl aus:

```bash
php composer require {$composerident}:^{$moduleversion} --update-no-dev
```

Im weiteren Ablauf werden Sie gefragt, ob die Moduldateien überschrieben werden sollen. Bestätigen Sie dies für den Eintrag `{$composerident}`.

> [!] Achten Sie darauf, dass Composer für die Installation die selbe PHP-Version verwendet, in der auch Ihr Shop ausgeführt wird. Sie erhalten sonst möglicherweise unpassende Modulpakete.

> [i] Benötigt Ihre Installation einen anderen Aufruf von Composer, ändern Sie den Befehl bitte entsprechend ab. Für weitere Optionen dieses Befehls lesen Sie bitte die [Dokumentation von Composer](https://getcomposer.org/doc/03-cli.md#require).