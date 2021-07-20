---
title: Patch zur Installation hinzufügen
---

### **auf der Kommandozeile**

Für das Modul **{$modulename}** sind Anpassungen an den originalen Dateien des Shops nötig. Die Änderungen werden automatisiert als Patches eingespielt. Um diese Patches integrieren zu können, ist es nötig, in der `composer.json`-Datei des Shopprojektes das Anwenden der Patches zu erlauben.

Führen Sie in der Konsole im Hauptverzeichnis Ihres Shops (oberhalb des `source`- und `vendor`-Verzeichnisses) diesen Befehl aus:

```bash
php composer config extra.enable-patching true
```

> [i] Benötigt Ihre Installation einen anderen Aufruf von Composer, ändern Sie den Befehl bitte entsprechend ab. Für weitere Optionen dieses Befehls lesen Sie bitte die [Dokumentation von Composer](https://getcomposer.org/doc/03-cli.md#config).

Im weiteren Ablauf der Installation werden Sie gefragt, ob die Dateien der folgenden Pakete überschrieben werden sollen:

* oxid-esales/...

Bestätigen Sie diese Frage, um den mitgelieferten Patch anzuwenden.

> [i] Beachten Sie, dass darin durchgeführte manuelle Änderungen überschrieben werden.