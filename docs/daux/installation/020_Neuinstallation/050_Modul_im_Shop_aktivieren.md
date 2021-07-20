---
title: Modul im Shop aktivieren
---

### **im Adminbereich**

Aktivieren Sie das Modul über den Shopadmin unter [ Erweiterungen ] -> [ Module ]. Klicken Sie nach Auswahl von [ {$menutitle} ] auf den Button [ Aktivieren ].

### **oder auf der Kommandozeile**

Alternativ können Sie die Modulaktivierung auch auf der Kommandozeile (CLI) im Hauptverzeichnis Ihres Shops (oberhalb des `source`- und `vendor`-Verzeichnisses) durchführen. 

```bash
./vendor/bin/oe-console oe:module:activate {$metadataident}
```

> [!] **Enterprise Edition**: Achten Sie darauf, dass das Modul in weiteren Shops (Mall) ebenfalls aktiviert werden muss, um dessen Funktion dort auch zu nutzen.

> [i] **Enterprise Edition**: Zur Aktivierung in einem bestimmten Shopmandanten verwenden Sie das `--shop-id`-Argument (`...oe-console --shop-id 1 oe:module...`)