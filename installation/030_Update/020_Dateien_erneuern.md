---
title: Dateien erneuern
---

Für das Modul **{$modulename}** sind Anpassungen an den originalen Dateien des Shops nötig. Die Änderungen werden automatisiert als Patches eingespielt. Um diese Patches integrieren zu können, ist es nötig, in der `composer.json`-Datei des Shopprojektes das Anwenden der Patches zu erlauben.

Führen Sie dann in der Konsole im Hauptverzeichnis Ihres Shops (oberhalb des `source`- und `vendor`-Verzeichnisses) diesen Befehl aus:

```bash
php composer config extra.enable-patching true
```

Starten Sie die Konsole Ihres Webservers und wechseln in das Hauptverzeichnis Ihres 
Shops (oberhalb des `source`- und `vendor`-Verzeichnisses). Führen Sie dort diesen Befehl aus:

```bash
php composer require {$composerident}:^{$moduleversion} --update-no-dev
```

Im weiteren Ablauf werden Sie gefragt, ob die Moduldateien überschrieben werden sollen. Bestätigen Sie dies für den Eintrag `{$composerident}`.

> [!] Achten Sie darauf, dass die Installation über Composer mit derselben PHP-Version erfolgt, in der auch Ihr Shop installiert ist. Sie erhalten sonst unpassende Modulpakete.

> [i] Benötigt Ihre Installation einen anderen Aufruf von Composer, ändern Sie den Befehl bitte entsprechend ab. Für weitere Optionen dieses Befehls lesen Sie bitte die [Dokumentation von Composer](https://getcomposer.org/doc/03-cli.md#require).