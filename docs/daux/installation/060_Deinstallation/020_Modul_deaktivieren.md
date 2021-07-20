---
title: Modul deaktivieren
---

### **im Adminbereich**

Deaktivieren Sie das Modul unter [ Erweiterungen ] -> [ Module ]. Klicken Sie nach Auswahl von [ {$menutitle} ] auf den Button [ Deaktivieren ].

### **oder auf der Kommandozeile**

Alternativ können Sie die Moduldeaktivierung auch über die Kommandozeile (CLI) im Hauptverzeichnis Ihres Shops (oberhalb des `source`- und `vendor`-Verzeichnisses) durchführen.

```bash
./vendor/bin/oe-console oe:module:deactivate {$metadataident}
```

> [!] **Enterprise Edition**: Achten Sie darauf, dass das Modul in allen weiteren Shops (Mall) ebenfalls deaktiviert werden muss.

> [i] **Enterprise Edition**: Zur Deaktivierung in einem bestimmten Shopmandanten verwenden Sie das `--shop-id`-Argument (`...oe-console --shop-id 1 oe:module...`)