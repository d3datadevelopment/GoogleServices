---
title: Shopanpassungen installieren
---

### **im Adminbereich**

Direkt nach der Modulaktivierung startet der Assistent, der Sie durch die Shopanpassung führt. Darin können Sie verschiedene Optionen der Installation wählen.

Den Installationsassistenten finden Sie auch unter den Menüpunkten [ Admin ] -> [ (D3) Module ] -> [ Modul-Connector ] -> [ Modulverwaltung ] -> [ Modulinstallation ].

Bei tiefgreifenden Änderungen an Ihrem Shop (z.B. Hinzufügen weiterer Sprachen oder Mandanten) rufen Sie den Installationsassistenten bitte erneut auf, um dann eventuell notwendige Nacharbeiten für das Modul ausführen zu lassen.

Möchten Sie die Änderungen manuell installieren, können Sie sich über diesen Assistenten ebenfalls eine Checkliste erstellen.

### **oder auf der Kommandozeile**

Der Installationsassistent steht Ihnen ebenfalls auf der Kommandozeile (CLI) zur Verfügung. Führen Sie diesen Befehl im Hauptverzeichnis Ihres Shops (oberhalb des `source`- und `vendor`-Verzeichnisses) aus:

```bash
./vendor/bin/d3modules_install
```