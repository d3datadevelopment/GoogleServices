---
title: TMP-Ordner leeren
---

### **im Adminbereich**

Leeren Sie das Verzeichnis `tmp` über [ Admin ] -> [ (D3) Module ] -> [ Modul-Connector ] -> [ TMP leeren ]. Markieren Sie [ komplett leeren ] und klicken auf [ TMP leeren ]. 

Sofern die Views nicht automatisch aktualisiert werden, führen Sie dies noch durch.

### **oder auf der Kommandozeile**

Alle TMP-leeren-Aktionen stehen Ihnen ebenfalls auf der Kommandozeile (CLI) zur Verfügung. Führen Sie diesen Befehl im Hauptverzeichnis Ihres Shops (oberhalb des `source`- und `vendor`-Verzeichnisses) aus:

```bash
./vendor/bin/d3cleartmp
```

> [i] Erfordert Ihre Installation eine andere Vorgehensweise zum Leeren des Caches oder zum Aktualisieren der Datenbank-Viewtabellen, führen Sie diese bitte aus.

> [i] Beim Kommandozeilenaufruf werden Ihnen weitere Optionen gezeigt, mit denen Sie die Aktion gezielt steuern können.